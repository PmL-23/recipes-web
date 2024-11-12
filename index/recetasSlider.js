document.addEventListener("DOMContentLoaded", function () {
    var swiper = new Swiper('#swiperRecetas', {
        slidesPerView: 3, 
        spaceBetween: 20, 
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        breakpoints: {
            992: {
                slidesPerView: 3, 
            },
            576: {
                slidesPerView: 2, 
            },
            0:{
                slidesPerView: 1, 
            }
        },
        grabCursor: true, 
        loop: false, 
    });
});