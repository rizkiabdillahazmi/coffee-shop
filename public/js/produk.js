const signature = new Glider(document.querySelector('.signature'), {
    slidesToShow: 4,
    slidesToScroll: 1,
    draggable: true,
    duration: 3,
    dots: '.dots',
    arrows: {
        prev: '#btn-prev',
        next: '#btn-next'
    }
});

gliderAutoplay(signature, {interval: 3000, pausable:true});

new Glider(document.querySelector('.coffee'), {
    slidesToShow: 4,
    slidesToScroll: 1,
    draggable: true,
    duration: 3,
    dots: '.dots',
    arrows: {
        prev: '#btn-prev-coffee',
        next: '#btn-next-coffee'
    }
});
new Glider(document.querySelector('.non-coffee'), {
    slidesToShow: 4,
    slidesToScroll: 1,
    draggable: true,
    duration: 3,
    dots: '.dots',
    arrows: {
        prev: '#btn-prev-non-coffee',
        next: '#btn-next-non-coffee'
    }
});
new Glider(document.querySelector('.snack'), {
    slidesToShow: 4,
    slidesToScroll: 1,
    draggable: true,
    duration: 3,
    dots: '.dots',
    arrows: {
        prev: '#btn-prev-snack',
        next: '#btn-next-snack'
    }
});
new Glider(document.querySelector('.daily-food'), {
    slidesToShow: 4,
    slidesToScroll: 1,
    draggable: true,
    duration: 3,
    dots: '.dots',
    arrows: {
        prev: '#btn-prev-daily-food',
        next: '#btn-next-daily-food'
    }
});