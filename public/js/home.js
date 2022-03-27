window.addEventListener('load', function(){
    const jumbotron = new Glider(document.querySelector('.jumbotron'), {
    slidesToShow: 1,
    slidesToScroll: 1,
    draggable: true,
    dots: '.dots',
    arrows: {
        prev: '#btn-prev-img',
        next: '#btn-next-img'
    }
});
gliderAutoplay(jumbotron, {interval: 3000, pausable:true});
});

window.addEventListener('load', function(){
    new Glider(document.querySelector('.promo-produk'), {
        slidesToShow: 4,
        slidesToScroll: 1,
        draggable: true,
        dots: '.dots',
        arrows: {
            prev: '#btn-prev',
            next: '#btn-next'
        }
    })
});