document.addEventListener("DOMContentLoaded", function () {
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        autoplay: {
            delay: 7000, // Increased delay for a slower effect
            disableOnInteraction: false,
        },
        effect: "fade",
        fadeEffect: {
            crossFade: true, // Ensures smooth fading between slides
        },
        speed: 2500, // Slows down the transition to 2 seconds
       
    });
});
