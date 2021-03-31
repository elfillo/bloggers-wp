var swiper = new Swiper('.swiper-container', {
    pagination: {
        el: '.swiper-pagination',
        type: 'progressbar',
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    slidesPerView: 'auto',
    breakpoints:{
        1100:{
            slidesPerView: 'auto',
            spaceBetween: 51,
            freeMode: true,
        }
    }
});