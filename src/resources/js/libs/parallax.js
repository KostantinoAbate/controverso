import SimpleParallax from "simple-parallax-js/vanilla";

export function useParallax(selector, options) {
    $(function(){
        let $image = $(selector);
        if($image.length){
            new SimpleParallax($image, {
                delay: 0,
                orientation: 'down',
                scale: 1.3,
                overflow: true,
                ...options,
            });
        }
    });
}

export function initParallax() {
    $(function(){
        let $images = $('[data-parallax]');
        if($images.length){
            $images.each(function(){
                new SimpleParallax(this, {
                    delay: 0,
                    orientation: 'down',
                    scale: 2,
                    overflow: true,
                });
            })
        }
    });
}

