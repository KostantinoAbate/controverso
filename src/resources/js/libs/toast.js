export function flashToast(type, message, autoDismiss = true, dismissTime = 7000) {
    const template = $(`
        <div class="toast toast-${type}">
            <div class="toast-content">
                ${message}
            </div>
            <div class="dyn-toast-close">
                <span class="icon-[tabler--x] size-5"></span>
            </div>
        </div>
    `);

    const container = $('#alert-container');

    if (window.debug) {
        if (container.length) {
            console.log('Toast flashed');
        } else {
            console.error('Missing alert container for Toast module');
        }
    }

    if (!container.length) return;

    // Append toast
    container.append(template);

    // Forzare ricalcolo layout per animazione
    requestAnimationFrame(() => {
        template.addClass('show'); // classe di entrata
    });

    // Chiudi al click sulla X
    template.find('.dyn-toast-close').on('click', () => hideToast(template));

    // Auto-dismiss
    if (autoDismiss) {
        setTimeout(() => {
            hideToast(template);
        }, dismissTime);
    }

    function hideToast(toast) {
        toast.removeClass('show').addClass('hide');
        setTimeout(() => {
            toast.remove();
        }, 150);
    }
}

export function laravelToast(autoDismiss = true, dismissTime = 7000) {
    $('.toast-close').each(function(){
        let $parent = $(this).parent();
        $(this).on('click', function(){
            $parent.removeClass('show').addClass('hide');
            setTimeout(() => {
                $parent.remove();
            }, 150);
        });
        if(autoDismiss) {
            setTimeout(() => {
                $parent.removeClass('show').addClass('hide');
                setTimeout(() => {
                    $parent.remove();
                }, 150);
            }, dismissTime)
        } else {
            $parent.removeClass('show').addClass('hide');
            setTimeout(() => {
                $parent.remove();
            }, 150);
        }
    });
}
