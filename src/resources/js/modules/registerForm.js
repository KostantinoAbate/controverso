import "flatpickr/dist/flatpickr.js";
import { Italian } from "flatpickr/dist/l10n/it.js";
import {attachDateMask} from "../libs/validator.js";
export function initRegister(){
    jQuery(function () {
        const today = new Date();
        const minAge = 14;
        const maxBirthDate = new Date(
            today.getFullYear() - minAge,
            today.getMonth(),
            today.getDate()
        );

        $('#input-birthdate').flatpickr({
            "locale": Italian,
            altInput: true,
            allowInput: true,
            altFormat: "d/m/Y",
            dateFormat: "Y-m-d",
            maxDate: maxBirthDate,
            onReady(selectedDates, dateStr, instance) {
                if (!instance.altInput) return;
                const $alt = $(instance.altInput);
                $alt.attr('validate-handle', 'date');
                $alt.attr('inputmode', 'numeric');
                $alt.attr('autocomplete', 'bday');
                attachDateMask($alt);
            },
        });
    });
}
