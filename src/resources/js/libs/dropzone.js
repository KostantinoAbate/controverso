export function useDropzone() {
    const $zones = $('[data-dropzone]');

    function isAccepted(file, inputEl) {
        // rispetta accept="" dell'input, se presente
        const accept = (inputEl.getAttribute('accept') || '').trim();
        if (!accept) return true;

        const mime = (file.type || '').toLowerCase();
        const name = (file.name || '').toLowerCase();

        return accept.split(',')
            .map(x => x.trim().toLowerCase())
            .some(rule => {
                if (!rule) return false;
                if (rule.endsWith('/*')) {
                    // es: image/*, video/*
                    return mime.startsWith(rule.replace('/*', '/'));
                }
                if (rule.startsWith('.')) {
                    // estensione
                    return name.endsWith(rule);
                }
                // mime specifico: image/png, video/mp4...
                return mime === rule;
            });
    }

    function setFilesToInput(inputEl, files) {
        // assegnare FileList direttamente non è sempre permesso: usiamo DataTransfer
        const dt = new DataTransfer();
        Array.from(files).forEach(f => dt.items.add(f));
        inputEl.files = dt.files;

        // trigger change per logiche eventuali
        $(inputEl).trigger('change');
    }

    function renderPreview($zone, file, kind) {
        // pulisco contenuto
        $zone.empty();

        // fallback: se non è previewable, mostro solo il nome
        const $name = $('<div class="text-xs opacity-80 break-all px-2"></div>').text(file.name);

        // GIF: spesso type è image/gif → la trattiamo come immagine (va bene anche se kind="video")
        const isImage = file.type.startsWith('image/');
        const isVideo = file.type.startsWith('video/');

        if (kind === 'image' || isImage) {
            const url = URL.createObjectURL(file);
            const $img = $(
                '<img class="w-full h-full max-h-48 object-contain rounded" alt="Preview" />'
            );
            $img.attr('src', url);
            $zone.append($img);

            // evita leak
            $img.on('load', () => URL.revokeObjectURL(url));
            return;
        }

        if (kind === 'video' || isVideo) {
            const url = URL.createObjectURL(file);

            // se è gif (image/gif) ma kind=video, la mostriamo comunque come immagine sopra
            const $video = $(
                '<video class="w-full h-full object-contain rounded" controls muted playsinline></video>'
            );
            $video.attr('src', url);
            $zone.append($video);

            $video.on('loadeddata', () => URL.revokeObjectURL(url));
            return;
        }

        $zone.append($name);
    }

    $zones.each(function () {
        const $zone = $(this);
        const targetSel = $zone.data('target');
        const kind = ($zone.data('kind') || '').toString();
        const $input = $(targetSel);

        if ($input.length === 0) return;

        // click sulla zona → apre file picker
        $zone.on('click', function () {
            $input.trigger('click');
        });

        // drag over styling
        $zone.on('dragenter dragover', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $zone.addClass('border-primary').addClass('bg-base-200/40');
        });

        $zone.on('dragleave dragend drop', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $zone.removeClass('border-primary').removeClass('bg-base-200/40');
        });

        // drop → assegna file + preview
        $zone.on('drop', function (e) {
            const files = e.originalEvent?.dataTransfer?.files;
            if (!files || !files.length) return;

            const file = files[0];

            const inputEl = $input.get(0);
            if (!isAccepted(file, inputEl)) return;

            setFilesToInput(inputEl, [file]);
            renderPreview($zone, file, kind);
        });

        // change input (selezione manuale) → preview
        $input.on('change', function () {
            const file = this.files && this.files[0];
            if (!file) return;

            if (!isAccepted(file, this)) return;
            renderPreview($zone, file, kind);
        });
    });
}
