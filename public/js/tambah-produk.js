const categories =  document.querySelectorAll('#pilihan-kategori');

const kategori = document.getElementById('kategori');
kategori.addEventListener("change", ambilKategori);

function ambilKategori(){
    if (categories[0].selected) {
        document.getElementById('Coffee').classList.remove("hidden");
        document.getElementById('Non-Coffee').classList.remove("hidden");
        document.getElementById('Makanan Ringan').classList.add("hidden");
        document.getElementById('Makanan Berat').classList.add("hidden");
    }
    else if (categories[1].selected) {
        document.getElementById('Makanan Ringan').classList.remove("hidden");
        document.getElementById('Makanan Berat').classList.remove("hidden");
        document.getElementById('Coffee').classList.add("hidden");
        document.getElementById('Non-Coffee').classList.add("hidden");
    }
}

function previewImage() {
    const image = document.querySelector('#gambar');
    const imgPreview =document.querySelector('.img-preview');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.classList.add('h-40');
        imgPreview.classList.add('mb-3');
        imgPreview.src = oFREvent.target.result;
    }
}
