// const rowA = document.querySelectorAll('.selectrow ')[1];
// console.log(rowA);
// const col1 = rowA.querySelector('.col-3 input');
// console.log(col1.value);

// const harga = document.querySelectorAll('.hargaBarang');
// const qtyy = document.querySelectorAll('.qty');
// const h = document.querySelector('#apaa');

// const rowSelect = document.querySelectorAll('.selectrow')

// function qtyil() {
//     if (this.value <= 0) {
//         if (this.value < 0) {            
//             alert('Sorry Input Cannot Be under 0')
//         }
//         this.value = 0
//     }
//     console.log(this.value)

//     const ac = document.querySelector('div.col-3 .subtotal');
//     ac.value = this.value * 60000;
// }

// qtyy.forEach((item) => item.addEventListener('change', qtyil));



const select = document.querySelector('#BarangSelect');
const menu = document.querySelectorAll('select option');
const btnToList = document.querySelector('#btn');
const btnTokeranjang = document.querySelector('#AdToKeranjang');

const RowAddQty = document.querySelector('#FormAddQty');

let nomerBarang = 1;

// Tabel Keranjang
const tblkeranjang = document.querySelector('#Keranjang');
const tBodyKeranjang = tblkeranjang.querySelector('tbody');

// Masuk Ke DATABASE TRANSAKSI
const totalBayar = document.getElementsByName('TotalBayar')[0];

function CreateIconDeleteItemTblKeranjang() {
    const tdAksi = document.createElement('td');

    const spanIcon = document.createElement('span');

    tdAksi.appendChild(spanIcon);

    spanIcon.classList.add('badge');
    spanIcon.classList.add('bg-danger');
    spanIcon.classList.add('border-0');

    spanIcon.style.cursor = 'pointer';

    return tdAksi;
}

function inputForm() {
    RowAddQty.innerHTML = "";

    const input1 = document.createElement('input');

    const selectUkuran = document.createElement('select');
    const pilihanUkuran1 = document.createElement('option');
    const pilihanUkuran2 = document.createElement('option');
    const pilihanUkuran3 = document.createElement('option');
    const pilihanUkuran4 = document.createElement('option');

    pilihanUkuran1.setAttribute('value', '1');
    pilihanUkuran1.innerHTML = '1 KG';

    pilihanUkuran2.setAttribute('value', '1/2');
    pilihanUkuran2.innerHTML = '1/2 Kg';

    pilihanUkuran3.setAttribute('value', '1/4'); 
    pilihanUkuran3.innerHTML = '1/4 KG';

    pilihanUkuran4.setAttribute('value', '3000');
    pilihanUkuran4.innerHTML = 'Ukuran 3000';

    selectUkuran.appendChild(pilihanUkuran1);
    selectUkuran.appendChild(pilihanUkuran2);
    selectUkuran.appendChild(pilihanUkuran3);
    selectUkuran.appendChild(pilihanUkuran4);

    selectUkuran.setAttribute('onchange' , 'GetSubTotal();');
    selectUkuran.setAttribute('id', 'pilihanUkuran');

    const input3 = document.createElement('input');
    const input4 = document.createElement('input');

    const div1 = document.createElement('div');
    const div2 = document.createElement('div');
    const div3 = document.createElement('div');
    const div4 = document.createElement('div');

    let HargaValue ;

    div1.setAttribute('class', 'col-3');
    div2.setAttribute('class', 'col-3');
    div3.setAttribute('class', 'col-3');
    div4.setAttribute('class', 'col-3');

    input1.setAttribute('value', select.value);
    input1.setAttribute('id', 'NamBarList');
    input1.setAttribute('disabled', true);
    input1.setAttribute('readonly', true);
    if (select.value == "Sistik") {
            HargaValue = 64000;
    } else {
        HargaValue = 60000;
    }

    // input2.setAttribute('value', HargaValue);
    // input2.classList.add('iniHarga');

    input3.setAttribute('type', 'number');
    input3.setAttribute('value', '1');
    input3.classList.add('iniQty');
    
    
    input1.classList.add('form-control');
    selectUkuran.classList.add('form-control');
    input3.classList.add('form-control');
    

    input4.setAttribute('disabled', true);
    input4.setAttribute('value',HargaValue);
    input4.classList.add('form-control');
    input4.classList.add('subTotal');

    input3.setAttribute('onchange' , 'GetSubTotal();');

    div1.appendChild(input1);
    div2.appendChild(selectUkuran);
    div3.appendChild(input3);
    div4.appendChild(input4);

    RowAddQty.appendChild(div1);
    RowAddQty.appendChild(div2);
    RowAddQty.appendChild(div3);
    RowAddQty.appendChild(div4);
}



function addToKeranjang() {
    // BUAT FORM INPUT UNTUK KE DATABASE DETAIL BARANG
    const NamBarInput = document.createElement('input');
    const HarBarInput = document.createElement('input');
    const ukuranInput = document.createElement('input');
    const qtyInput = document.createElement('input');
    const subtotalInput = document.createElement('input');
    
    // GET FROM LIST
    const namaBarang = RowAddQty.querySelector('#NamBarList');
    const SubTotal = RowAddQty.querySelector('.subTotal');
    const qtyFromList = RowAddQty.querySelector('.iniQty');
    const UkuranBarang = RowAddQty.querySelector('#pilihanUkuran');
    
    const tdAksi = document.createElement('td');

    const spanIcon = document.createElement('span');


    // NamBarInput.setAttribute('disabled', '');
    NamBarInput.setAttribute('readonly', '');

    // HarBarInput.setAttribute('disabled', '');
    HarBarInput.setAttribute('readonly', '');

    // ukuranInput.setAttribute('disabled', '');
    ukuranInput.setAttribute('readonly', '');

    // qtyInput.setAttribute('disabled', '');
    qtyInput.setAttribute('readonly', '');

    // subtotalInput.setAttribute('disabled', '');
    subtotalInput.setAttribute('readonly', '');

    NamBarInput.classList.add('border-0');
    HarBarInput.classList.add('border-0');
    ukuranInput.classList.add('border-0');
    qtyInput.classList.add('border-0');
    subtotalInput.classList.add('border-0');

    NamBarInput.classList.add('bg-transparent');
    HarBarInput.classList.add('bg-transparent');
    ukuranInput.classList.add('bg-transparent');
    qtyInput.classList.add('bg-transparent');
    subtotalInput.classList.add('bg-transparent');

    NamBarInput.setAttribute('value', namaBarang.value);
    HarBarInput.setAttribute('value', '60000');
    ukuranInput.setAttribute('value', UkuranBarang.value);
    qtyInput.setAttribute('value', qtyFromList.value);
    subtotalInput.setAttribute('value',  SubTotal.value);

    NamBarInput.setAttribute('name', "BR" + nomerBarang);
    HarBarInput.setAttribute('name', 'harga' + nomerBarang);
    ukuranInput.setAttribute('name', 'ukuran' + nomerBarang);
    qtyInput.setAttribute('name', 'jumlah' + nomerBarang);
    subtotalInput.setAttribute('name', 'subtotal' + nomerBarang);

    nomerBarang++;

    tdAksi.appendChild(spanIcon);

    spanIcon.classList.add('badge');
    spanIcon.classList.add('bg-danger');
    spanIcon.classList.add('border-0');

    spanIcon.style.cursor = 'pointer';

    spanIcon.innerHTML = 'X';

    const tr = document.createElement('tr');

    const tdNo = document.createElement('td');
    const tdNamaBarang = document.createElement('td');
    const tdHargaSatuan = document.createElement('td');
    const tdUkuran = document.createElement('td');
    const tdQuantity = document.createElement('td');
    const tdSubTotal = document.createElement('td');

    tdNamaBarang.setAttribute('name', 'nambar');

    // TD NO LIST
    tdNo.innerHTML = '1';

    // tdNo.appendChild(NamBarInput);
    tdNamaBarang.appendChild(NamBarInput);
    tdHargaSatuan.appendChild(HarBarInput);
    tdUkuran.appendChild(ukuranInput);
    tdQuantity.appendChild(qtyInput);
    tdSubTotal.appendChild(subtotalInput);

    tr.appendChild(tdNo);
    tr.appendChild(tdNamaBarang);
    tr.appendChild(tdHargaSatuan);
    tr.appendChild(tdUkuran);
    tr.appendChild(tdQuantity);
    tr.appendChild(tdSubTotal);
    tr.appendChild(tdAksi);

    tBodyKeranjang.appendChild(tr);

    
    console.log(parseInt(subtotalInput.value))

    totalBayar.value = parseInt(subtotalInput.value) + parseInt(totalBayar.value);
}


function iyu() {
    
}



function GetSubTotal() {
    const qty = RowAddQty.querySelector('.iniQty');
    const subTotal = RowAddQty.querySelector('.subTotal');
    const ukuran = RowAddQty.querySelector('#pilihanUkuran');

    
    if (qty.value == 0) {
        qty.value = 1;
        
        alert('Jumlah tidak boleh kurang dari 1');
    }

    let ukuranIni;

    if (ukuran.value == '1') {
        ukuranIni = 60000 * 1;
    } else if (ukuran.value == '1/2') {
        ukuranIni = 60000 * 1 / 2;
    } else  if (ukuran.value == '1/4') {
        ukuranIni = 60000 * 1 / 4;
    } else if (ukuran.value == '3000') {
        ukuranIni = 3000;
    } else {
        
    }

    subTotal.value = ukuranIni * qty.value;
}



btnToList.addEventListener('click', inputForm);
btnTokeranjang.addEventListener('click', addToKeranjang)



inputForm();