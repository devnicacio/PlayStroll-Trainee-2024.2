// Configuração para o primeiro Swiper
const swiper1 = new Swiper('#swiper-principal', { 
    direction: 'horizontal',
    loop: true,
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
