import "flatpickr/dist/flatpickr.js";
import { Italian } from "flatpickr/dist/l10n/it.js";

//options on: https://flatpickr.js.org/options/

export function useDatepicker(selector,options = {}) {
    let $input = $(selector);
    if($input.length) {
        $input.flatpickr({
            "locale": Italian,
            altInput: true,
            allowInput: true,
            altFormat: "d/m/Y",
            dateFormat: "Y-m-d",
            minDate: "today",
            ...options,
        });
    }
}
