export function landingNavbar() {
    const $navIcon = $('#nav-icon');
    const $navMenu = $('#nav-menu');
    const $blurredMask = $('#blurred-mask');

    jQuery(function(){
        $navIcon.on('click', function(){
            if($navIcon.data('menu') === 'open') {
                closeMenu();
            } else {
                openMenu();
            }
        });
        $blurredMask.on('click', function(){
            closeMenu();
        });
        $(document).on('keydown', function (e) {
            if (e.key === 'Escape' && $navIcon.data('menu') === 'open') {
                closeMenu();
            }
        });
    });

    function openMenu() {
        $navIcon.data('menu', 'open');
        $navIcon.addClass('open');
        $navMenu.removeClass('-translate-x-full');
        $navMenu.addClass('translate-x-0');
        $blurredMask.removeClass('opacity-0 pointer-events-none').addClass('opacity-100 pointer-events-auto');
        $('body').addClass('overflow-hidden');
    }

    function closeMenu() {
        $navIcon.data('menu', 'closed');
        $navIcon.removeClass('open');
        $navMenu.removeClass('translate-x-0');
        $navMenu.addClass('-translate-x-full');
        $blurredMask.removeClass('opacity-100 pointer-events-auto').addClass('opacity-0 pointer-events-none');
        $('body').removeClass('overflow-hidden');
    }
}
