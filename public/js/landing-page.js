// Configuração para o primeiro Swiper
const swiper1 = new Swiper('#swiper-principal', { 
    direction: 'horizontal',
    loop: true,
    autoplay: {
        delay: 5000, 
        disableOnInteraction: false, 
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});


// Configuração para o segundo Swiper
const swiper2 = new Swiper('#swiper-secundario', {
    direction: 'horizontal',
    loop: true,
    slidesPerView: 2, 
    spaceBetween: 100,
    navigation: {
        nextEl: '.swiper-button-next', 
        prevEl: '.swiper-button-prev',
    },
    breakpoints: { // Responsividade
        320: {
            slidesPerView: 1, 
        },
        480: {
            slidesPerView: 1, 
        },
        768: {
            slidesPerView: 1, 
        },
        1024: {
            slidesPerView: 2, 
        },
        1440: {
            slidesPerView: 3,
        }
    },
});
const swiperTerceiro = new Swiper('#swiper-terceiro', {
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: {
        nextEl: '#terceiro-next',
        prevEl: '#terceiro-prev',
    },
    breakpoints: {
        640: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 40,
        },
    },
});
document.addEventListener('DOMContentLoaded', function() {
    var swiper = new Swiper('#swiper-terceiro', {
        slidesPerView: 'auto',
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 5000, 
            disableOnInteraction: false, 
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
});
