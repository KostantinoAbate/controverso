export function validator() {
    jQuery(function () {
        const $forms = $('[validate-form]');

        $forms.each(function () {
            const $form = $(this);
            const $submit = $form.find('[validate-submit]');
            const $required = $form.find('[validate-required]');

            function isFieldValid($field) {
                const tag = ($field.prop('tagName') || '').toLowerCase();
                const type = ($field.attr('type') || '').toLowerCase();
                const name = $field.attr('name');

                // RADIO / CHECKBOX (singolo o gruppo per name)
                if (type === 'checkbox' || type === 'radio') {
                    // Se ha name, validiamo come gruppo (almeno uno checked)
                    if (name) {
                        const $group = $form.find(`[name="${CSS.escape(name)}"]`).filter(`[type="${type}"]`);
                        return $group.is(':checked');
                    }
                    // Fallback: singolo senza name
                    return $field.is(':checked');
                }

                // SELECT
                if (tag === 'select') {
                    const val = $field.val();
                    if (Array.isArray(val)) return val.length > 0; // multiple
                    return val !== null && String(val).trim() !== '';
                }

                // TEXTAREA
                if (tag === 'textarea') {
                    return ($field.val() ?? '').toString().trim() !== '';
                }

                // RANGE (o altri input)
                const value = $field.val();
                return value !== null && value !== undefined && String(value).trim() !== '';
            }

            function markInvalid($field, invalid) {
                const type = ($field.attr('type') || '').toLowerCase();
                const name = $field.attr('name');

                // Se è un gruppo radio/checkbox, marca tutto il gruppo
                if ((type === 'checkbox' || type === 'radio') && name) {
                    const $group = $form.find(`[name="${CSS.escape(name)}"]`).filter(`[type="${type}"]`);
                    $group.toggleClass('is-invalid', invalid);
                    return;
                }

                $field.toggleClass('is-invalid', invalid);
            }

            function validateForm() {
                let isValid = true;

                // Pulisci invalid (anche sui gruppi)
                $required.each(function () {
                    markInvalid($(this), false);
                });

                $required.each(function () {
                    const $field = $(this);
                    const valid = isFieldValid($field);

                    if (!valid) {
                        markInvalid($field, true);
                        isValid = false;
                    }
                });

                // Focus primo invalido visibile
                const $firstInvalid = $form.find('.is-invalid:visible').first();
                if ($firstInvalid.length) {
                    $firstInvalid.trigger('focus');
                }

                return isValid;
            }

            $submit.on('click', function (e) {
                e.preventDefault();

                if (validateForm()) {
                    $form.trigger('submit');
                }
            });

            // Rimuovi invalid appena torna valido (anche per radio/checkbox di gruppo)
            $form.on('input change', '[validate-required]', function () {
                const $field = $(this);

                if (isFieldValid($field)) {
                    markInvalid($field, false);
                } else {
                    // opzionale: se vuoi che rimanga rosso finché non valido
                    // markInvalid($field, true);
                }
            });
        });

        /**
         * Handle functions
         */
        // Username
        $(document).on('input', '[validate-handle="username"]', function () {
            let value = $(this).val();
            value = value.replace(/[^a-zA-Z0-9]/g, '');
            $(this).val(value);
        });

        // Email
        $(document).on('input', '[validate-handle="email"]', function () {
            let $input = $(this);
            let value = $input.val();
            value = value.replace(/\s/g, '');
            $input.val(value);
        });
    });
}

export function attachDateMask($input) {

    function onlyDigits(str) {
        return (str || '').replace(/\D/g, '').slice(0, 8);
    }

    function format(digits, addTrailingSlash) {
        if (digits.length <= 2) return digits + (addTrailingSlash && digits.length === 2 ? '/' : '');
        if (digits.length <= 4) {
            let out = digits.slice(0, 2) + '/' + digits.slice(2);
            if (addTrailingSlash && digits.length === 4) out += '/';
            return out;
        }
        return digits.slice(0, 2) + '/' + digits.slice(2, 4) + '/' + digits.slice(4);
    }

    function caretFromDigitIndex(digitIndex) {
        if (digitIndex <= 2) return digitIndex;
        if (digitIndex <= 4) return digitIndex + 1;
        return digitIndex + 2;
    }

    function digitIndexFromCaret(value, caretPos) {
        const left = value.slice(0, caretPos);
        return (left.match(/\d/g) || []).length;
    }

    // Evita doppio bind
    if ($input.data('dateMaskAttached')) return;
    $input.data('dateMaskAttached', true);

    $input.on('keydown.dateMask', function (e) {
        $(this).data('dateMaskKey', e.key);
    });

    $input.on('focus.dateMask', function () {
        const digits = onlyDigits(this.value);
        $(this).data('dateMaskDigits', digits);
    });

    $input.on('input.dateMask', function () {
        const input = this;
        const key = $(input).data('dateMaskKey') || '';
        const prevDigits = $(input).data('dateMaskDigits') || '';

        const raw = input.value;
        const caret = input.selectionStart ?? raw.length;

        let digitIndex = digitIndexFromCaret(raw, caret);

        const digits = onlyDigits(raw);
        const isAdding = digits.length > prevDigits.length && key !== 'Backspace' && key !== 'Delete';
        const addTrailingSlash = isAdding && (digits.length === 2 || digits.length === 4);

        const formatted = format(digits, addTrailingSlash);
        input.value = formatted;

        if (isAdding && (digits.length === 2 || digits.length === 4)) {
            input.setSelectionRange(formatted.length, formatted.length);
        } else {
            digitIndex = Math.min(digitIndex, digits.length);
            const newCaret = caretFromDigitIndex(digitIndex);
            input.setSelectionRange(newCaret, newCaret);
        }

        $(input).data('dateMaskDigits', digits);
    });

    $input.on('blur.dateMask', function () {
        const digits = onlyDigits(this.value);
        this.value = format(digits, false);
        $(this).data('dateMaskDigits', digits);
    });
}
