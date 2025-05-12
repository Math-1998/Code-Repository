const swiperDiferenciais = new Swiper(".swiperDiferenciais", {
    slidesPerView: 1,
    spaceBetween: 20,
    navigation: {
        nextEl: ".buttonSwiper-next",
        prevEl: ".buttonSwiper-prev",
    },
    breakpoints: {
        768: {
            slidesPerView: 5,
        },
    },
});

const swiperDiferenciaisM = new Swiper(".swiperDiferenciaisM", {
    slidesPerView: 1,
    spaceBetween: 20,
    navigation: {
        nextEl: ".buttonSwiper-next",
        prevEl: ".buttonSwiper-prev",
    },
    breakpoints: {
        768: {
            slidesPerView: 3,
        },
    },
});

const swiperTecnologias = new Swiper(".swiperTecnologias", {
    slidesPerView: 1,
    spaceBetween: 20,
    navigation: {
        prevEl: ".buttonSwiper-prev",
        nextEl: ".buttonSwiper-next",
    },
    breakpoints: {
        768: {
            slidesPerView: 5,
        },
    }
});

const swiperColumns3 = new Swiper(".swiperColumns3", {
    slidesPerView: 1,
    spaceBetween: 20,
    navigation: {
        prevEl: ".buttonSwiper-prev",
        nextEl: ".buttonSwiper-next",
    },
    breakpoints: {
        768: {
            slidesPerView: 3,
        },
    }
});


const swiperProcedimentos = new Swiper(".swiperProcedimentos", {
    slidesPerView: 1,
    spaceBetween: 20,
    navigation: {
        nextEl: ".buttonSwiper-next",
        prevEl: ".buttonSwiper-prev",
    },
    breakpoints: {
        768: {
            slidesPerView: 5,
        },
    },
});

const swiperProtocolos = new Swiper(".swiperProtocolos", {
    slidesPerView: 1,
    spaceBetween: 30,
    grid: {
        rows: 1,
    },
    breakpoints: {
        768: {
            slidesPerView: 3,
            grid: {
                rows: 3,
                fill: "row"
            },
        }
    },
    navigation: {
        nextEl: ".buttonSwiper-next",
        prevEl: ".buttonSwiper-prev",
    }
    
});

const swiperProcedimentosM = new Swiper(".swiperProcedimentosM", {
    slidesPerView: 1,
    spaceBetween: 30,
    grid: {
        rows: 1,
    },
    breakpoints: {
        768: {
            slidesPerView: 4,
            grid: {
                rows: 2,    
                fill: "row"
            },
        }
    },
    navigation: {
        nextEl: ".buttonSwiper-next",
        prevEl: ".buttonSwiper-prev",
    }
    
});