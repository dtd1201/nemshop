const swiper = new Swiper("#home-banner .swiper", {
  // Optional parameters
  direction: "horizontal",
  loop: true,
  speed: 1000,

  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },

  autoplay: {
    delay: 3000,
  },
});

const swiperCarousel = new Swiper("#home-carousel .swiper", {
  // Optional parameters
  direction: "horizontal",
  loop: true,
  loopFillGroupWithBlank: true,
  speed: 1000,
  centeredSlides: true,
  slidesPerView: 1,

  autoplay: {
    delay: 3000,
  },

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  pagination: {
    el: ".swiper-pagination",
  },
});
