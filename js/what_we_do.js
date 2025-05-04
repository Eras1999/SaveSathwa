$(document).ready(function() {
    // Initialize Owl Carousel for the slider
    $('.owl-carousel').owlCarousel({
        items: 3,
        loop: true,
        margin: 20,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });
});