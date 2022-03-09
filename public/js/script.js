const btn_prev = document.querySelector('#btn-prev');
const btn_next = document.querySelector('#btn-next');
let count =0;
const product_items = document.querySelectorAll('.product>div');
let width = product_items[0].offsetWidth;
// let marginRight = product_items[0].currentStyle.marginRight;

btn_prev.addEventListener('click',function () {
    console.log('majusaat count',count);
    if(count !== 0){
        count +=1;
        product_items.forEach((element) => {
            element.style.transform = `translateX(${(width+50) * count}px)`;
        });
        console.log('current count',count);
    }
})

btn_next.addEventListener('click',function () {
    console.log('mundur saat count',count);
    if (count !== -1*(product_items.length - 4)) {
        count -=1;
        product_items.forEach((element) => {
            element.style.transform = `translateX(${(width+50) * count}px)`;
        });
        console.log('current count',count);
    }
})