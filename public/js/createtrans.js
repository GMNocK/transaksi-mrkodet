const rowA = document.querySelectorAll('.row')[2];

const col1 = rowA.querySelector('.col-3 input');
console.log(col1.value);

const harga = document.querySelectorAll('.hargaBarang');
const qtyy = document.querySelectorAll('.qty');
const h = document.querySelector('#apaa');


function itu() {
    console.log(this.value);
}

h.onchange = itu;

function ilang() {
    harga.forEach((item) => 
    item.classList.toggle('d-none'));
    this.classList.remove('d-none');
}
function qtyil() {
    if (this.value <= 0) {
        if (this.value < 0) {            
            alert('Sorry Input Cannot Be under 0')
        }
        this.value = 0
    }
    qtyy.forEach((item) => 
    item.classList.toggle('d-none'));
    this.classList.remove('d-none');
    console.log(this.value)

    const ac = document.querySelector('div.col-3 .subtotal');
    ac.value = this.value * 60000;
}

harga.forEach((item) => item.addEventListener('click', ilang));

qtyy.forEach((item) => item.addEventListener('change', qtyil));

// qtyy.forEach((item) => item.addEventListener('')


// function load(){
//     list.forEach((item) =>
//     item.classList.remove('apa'));

//     list.forEach((item) =>
//     console.log(item.value))
// }
// list.forEach((item) =>
// item.addEventListener('change',load))

