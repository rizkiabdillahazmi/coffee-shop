const expandCell = function (element, event) {

    console.log(element);
    console.log(event.target);

    const cell = element.closest('.dropdown__wrapper').querySelector('.dropdown__cell-content');
    // if (event.target.classList.contains('dropdown__cell')) {


        console.log(event.target.nextSibling);
        cell.classList.toggle('max-h-0');
        cell.classList.toggle('max-h-80');
        cell.classList.toggle('mt-4');
}
