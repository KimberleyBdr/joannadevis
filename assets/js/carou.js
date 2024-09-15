// Create a new Swiper (slideshow) for HTML element with class 'blog-slider'.
let swiper = new Swiper('.blog-slider', {
    // Space (in pixels) between each slide in the slider.
    spaceBetween: 30,
    // Transition effect between the slides of the slider. Here, a crossfade (fade).
    effect: 'fade',
    // Indicate whether the slider should loop continuously (true) or not (false).
    loop: true,
    // Enable mouse wheel support for scrolling the slider.
    mousewheel: {
        // Indicates whether the wheel scroll direction should be reversed (true) or not (false).
        invert: false,
    },
    // Parameters for the pagination (the little indicator dots) of the slider.
    pagination: {
        // Specifies the HTML element in which the pagination should be created.
        el: '.blog-slider__pagination',
        // Indicate whether indicator dots are clickable (true) or not (false).
        clickable: true,
    }
});

