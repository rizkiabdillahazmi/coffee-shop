const swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
});

const productSwiper = new Swiper('.productSwiper', {
    slidesPerView: 4,
    direction: getDirection(),
    navigation: {
      nextEl: '.swiper-button-next1',
      prevEl: '.swiper-button-prev1',
    },
    on: {
      resize: function () {
        swiper.changeDirection(getDirection());
      },
    },
  });

  function getDirection() {
    var windowWidth = window.innerWidth;
    var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';

    return direction;
  }