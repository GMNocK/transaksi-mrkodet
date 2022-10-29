// const a = document.querySelectorAll('.form-control');
// const b = document.querySelector('#tanggal');
// const c = document.querySelectorAll('#qty');
// const d = document.querySelector('.apa');

// console.log(b.value);

// function load() {
//     c.forEach((item) =>
//     item.classList.remove('apa'));
//     // this.classList.add('active');
// }



// c.forEach((item) => item.addEventListener('onChange', load));
// function apa() {            
// }
// c.forEach((item) => item.addEventListener('change', apa);


// const list = document.querySelectorAll('#qty');
// function load(){
//     list.forEach((item) =>
//     item.classList.remove('active'));
//     this.classList.add('active');
// }
// list.forEach((item) =>
// item.addEventListener('click',load))


const list = document.querySelectorAll('.form-control');


function load(){
    list.forEach((item) =>
    item.classList.remove('apa'));
    list.forEach((item) =>
    console.log(this.value))
}
list.forEach((item) =>
item.addEventListener('click',load))
