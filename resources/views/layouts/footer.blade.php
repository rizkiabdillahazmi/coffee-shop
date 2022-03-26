<!-- Footer -->
<footer class="mt-20 max-w-full bg-white">
    <div class="max-w-screen-xl mx-auto p-4 text-center">
        <span>Made With<span class="text-red-600">&#10084</span>by <a href="https://rizkiabdillahazmi.my.id" target="_blank" class="text-teal-600 hover:text-red-500">Rizki
                Abdillah Azmi</a></span>
    </div>
</footer>

<!-- Glider -->
<script src="{{ asset('js/glider.min.js') }}"></script>
<script src="{{ asset('js/glider-autoplay.js') }}"></script>

<script>
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

</script>