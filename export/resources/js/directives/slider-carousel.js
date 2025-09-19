import Swiper from 'swiper';
import {Scrollbar} from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/scrollbar';

Alpine.directive('slider-carousel', (el, {expression}, {effect, cleanup}) => {
    let swiper;
    let resizeObserver;
    let resizeTimeout;
    let debouncedResize;

    function initSwiper() {
        const offsetHelper = el.querySelector('.offset-helper');
        const offsetLeft = offsetHelper ? offsetHelper.getBoundingClientRect().left : 16;

        if (swiper) {
            swiper.destroy(true, true);
        }

        // Parse custom options from data-options attribute if available
        let customOptions = {};
        if (el.dataset.options) {
            try {
                customOptions = JSON.parse(el.dataset.options);
            } catch (e) {
                console.error('Invalid JSON in data-options attribute', e);
            }
        }

        // Default options
        const defaultOptions = {
            modules: [Scrollbar],
            autoplay: false,
            slidesPerView: 1.2,
            spaceBetween: 48,
            slidesOffsetBefore: offsetLeft,
            slidesOffsetAfter: offsetLeft,
            watchOverflow: true,
            longSwipesRatio: .25,
            scrollbar: {
                el: '.swiper-scrollbar',
                draggable: true,
            },
            breakpoints: {
                1024: {
                    slidesPerView: 1.5,
                },
                1280: {
                    slidesPerView: 2.5,
                }
            },
        };

        // Merge default options with custom options
        const options = {...defaultOptions, ...customOptions};

        swiper = new Swiper(el, options);
    }

    effect(() => {
        // Immediate init for first load
        initSwiper();

        // Debounced resize handler only for resize events
        debouncedResize = () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(initSwiper, 150);
        };

        // Watch for changes in the element size (immediate for layout changes)
        resizeObserver = new ResizeObserver(() => {
            initSwiper();
        });
        resizeObserver.observe(el);

        // Watch for changes in the window size (debounced for resize events)
        window.addEventListener('resize', debouncedResize);
    });

    cleanup(() => {
        if (swiper) {
            swiper.destroy(true, true);
        }
        if (resizeObserver) {
            resizeObserver.disconnect();
        }
        if (debouncedResize) {
            window.removeEventListener('resize', debouncedResize);
        }
        if (resizeTimeout) {
            clearTimeout(resizeTimeout);
        }
    });
});
