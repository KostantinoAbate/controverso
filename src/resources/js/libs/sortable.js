import Sortable from 'sortablejs';

//options on: https://github.com/SortableJS/Sortable

export function useSortable(selector,options) {
    let $selector = $(selector);
    if($selector.length) {
        Sortable.create(selector, {
            animation: 150,
            ...options,
        });
    }
}
