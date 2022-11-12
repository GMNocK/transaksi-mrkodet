

const select = document.querySelector('#BarangSelect');
const menu = document.querySelectorAll('select option');
const btnTokeranjang = document.querySelector('#AdToKeranjang');

const RowAddQty = document.querySelector('#addBarangModal');

let nomerBarang = 1;

// Tabel Keranjang
const tblkeranjang = document.querySelector('#Keranjang');
const tBodyKeranjang = tblkeranjang.querySelector('tbody');

// Masuk Ke DATABASE TRANSAKSI
const totalBayar = document.getElementsByName('TotalBayar')[0];
const PanjangDetail = document.querySelector('#banyakBarang');

const statusInput = document.querySelector('#status');

let spanIcon;

let banyakBarangDikeranjang = [];

totalBayar.value = "Rp.0";


function inputAtributSet(inpnb , inphb, inpub, inpqty, inpst, itemnb, itemqty, itemub, itemst) {
    inpnb.setAttribute('readonly', '');

    inphb.setAttribute('readonly', '');

    inpub.setAttribute('readonly', '');

    inpqty.setAttribute('readonly', '');

    inpst.setAttribute('readonly', '');

    inpnb.classList.add('text-dark');
    inphb.classList.add('text-dark');
    inpub.classList.add('text-dark');
    inpqty.classList.add('text-dark');
    inpst.classList.add('text-dark');
    
    inpnb.classList.add('text-center');
    inphb.classList.add('text-center');
    inpub.classList.add('text-center');
    inpqty.classList.add('text-center');
    inpst.classList.add('text-center');
    
    inpnb.classList.add('border-0');
    inphb.classList.add('border-0');
    inpub.classList.add('border-0');
    inpqty.classList.add('border-0');
    inpst.classList.add('border-0');

    inpnb.classList.add('bg-transparent');
    inphb.classList.add('bg-transparent');
    inpub.classList.add('bg-transparent');
    inpqty.classList.add('bg-transparent');
    inpst.classList.add('bg-transparent');


    inpnb.classList.add('nama-barang');
    inphb.classList.add('harga-barang');
    inpub.classList.add('ukuran-barang');
    inpqty.classList.add('jumlah-beli');
    inpst.classList.add('sub-total');

    inpnb.setAttribute('value', itemnb.value);
    inphb.setAttribute('value', 'Rp.60000');
    inpub.setAttribute('value', itemub.value);
    inpqty.setAttribute('value', itemqty.value);
    inpst.setAttribute('value',  "Rp."+itemst);

    inpnb.setAttribute('name', "BR" + nomerBarang);
    inphb.setAttribute('name', 'harga' + nomerBarang);
    inpub.setAttribute('name', 'ukuran' + nomerBarang);
    inpqty.setAttribute('name', 'jumlah' + nomerBarang);
    inpst.setAttribute('name', 'subtotal' + nomerBarang);

    banyakBarangDikeranjang.push(nomerBarang);
    PanjangDetail.value = banyakBarangDikeranjang;
    nomerBarang++;
}

function addToKeranjang() {

    let buat = 1;

    const NamBarInput = document.createElement('input');
    const HarBarInput = document.createElement('input');
    const ukuranInput = document.createElement('input');
    const qtyInput = document.createElement('input');
    const subtotalInput = document.createElement('input');
    
    // GET FROM LIST
    const namaBarang = RowAddQty.querySelector('#NamBarList');
    const qtyFromList = RowAddQty.querySelector('#iniQty');
    const UkuranBarang = RowAddQty.querySelector('#pilihanUkuran');
    const SubTotalFromInp = RowAddQty.querySelector('#subTotal');
    let dariSubtot = ""+ SubTotalFromInp.value;
    let subtot = parseInt(dariSubtot.slice(3,dariSubtot.length));

    const tdAksi = document.createElement('td');
    
    
    inputAtributSet(
        NamBarInput, HarBarInput, ukuranInput, qtyInput, subtotalInput,
        namaBarang, qtyFromList, UkuranBarang, subtot
        );

    const isiTblKer = tBodyKeranjang.querySelectorAll('tr');

    if (isiTblKer != null) {        
        isiTblKer.forEach((item) => {
    
            const tdInambar = item.querySelector('td .nama-barang');
            const tdhbar = item.querySelector('td .harga-barang');
            const tdIukbar = item.querySelector('td .ukuran-barang');
            const tdIqty = item.querySelector('td .jumlah-beli');
            const tdIsubtot = item.querySelector('td .sub-total');

            // Ambil Angka dari subtot
            let subtotKeranjang = "" + tdIsubtot.value;
            let hasilSubtot = parseInt(subtotKeranjang.slice(3,subtotKeranjang.length));

            if (tdInambar != null && tdIukbar.value != null) {

                if (tdInambar.value == NamBarInput.value && tdIukbar.value == ukuranInput.value) {
                    tdIqty.value = parseInt(tdIqty.value) + parseInt(qtyFromList.value);
                    
                    tdIsubtot.value = "Rp."+ (hasilSubtot + parseInt(subtot));

                    buat = 0;               
                }

            } 
            
        });
    }

    if (buat == 1) {
        
        // BUAT FORM INPUT UNTUK KE DATABASE DETAIL BARANG
    
        iconDltMaker(tdAksi)
        
        // tdAksi.appendChild(IconDelete);
        tdAksi.classList.add('text-center');
    
    
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

        tdNo.classList.add('text-center');
        tdNamaBarang.classList.add('text-center');
        tdHargaSatuan.classList.add('text-center');
        tdUkuran.classList.add('text-center');
        tdQuantity.classList.add('text-center');
        tdSubTotal.classList.add('text-center');
    
        tdNamaBarang.classList.add('nambar');
        tdHargaSatuan.classList.add('harbar');
        tdUkuran.classList.add('ukuran');
        tdQuantity.classList.add('qty');
        tdSubTotal.classList.add('subTotal');
    
        tr.appendChild(tdNo);
        tr.appendChild(tdNamaBarang);
        tr.appendChild(tdHargaSatuan);
        tr.appendChild(tdUkuran);
        tr.appendChild(tdQuantity);
        tr.appendChild(tdSubTotal);
        tr.appendChild(tdAksi);
    
        tBodyKeranjang.appendChild(tr);
    
        
    }
    
    let getTotalBayar = ""+ totalBayar.value;
    let hasilTotalBayar = parseInt(getTotalBayar.slice(3,getTotalBayar.length));

    totalBayar.value = "Rp." + (subtot + hasilTotalBayar);
    spanIcon = document.querySelectorAll('i.fa');
    
    spanIcon.forEach((item) => {
        item.addEventListener('click', DeleteItemTblKer);
    });

    buat =1;    
}


function iconDltMaker(td) {
    const icon = document.createElement('i');

    // icon.classList.add('align-middle');
    // icon.setAttribute('data-feather', 'eye');

    // KALAU PAKE Font Awesome
    icon.classList.add('fa');
    icon.classList.add('fa-trash-alt');
    icon.classList.add('text-center');

    icon.style.cursor = 'pointer';

    td.appendChild(icon);
}


function DeleteItemTblKer() {
    spanIcon.forEach((item) => {
      item.classList.remove('d-none');
    });
    let parentA = this.parentNode;
    let tblRow = parentA.parentNode;
    

    // return console.log(parentA);
    const tdSubTotal = tblRow.querySelector('td.subTotal');
    const inputSubTot = tdSubTotal.querySelector('input');

    let getTotal = "" + totalBayar.value;
    let total = parseInt(getTotal.slice(3,getTotal.length));

    let getSubTot = inputSubTot.value + "";
    let subTot = parseInt(getSubTot.slice(3, getSubTot.length));
    totalBayar.value = "Rp."+ (total - subTot);
    
    tBodyKeranjang.removeChild(tblRow);
}


function GetSubTotal() {
    const qty = RowAddQty.querySelector('#iniQty');
    const subTotal = RowAddQty.querySelector('#subTotal');
    const ukuran = RowAddQty.querySelector('#pilihanUkuran');

    if (qty.value == 0) {
        qty.value = 1;
        
        Swal.fire({
            position: 'top',
            icon: 'warning',
            title: 'Pembelian Tidak Bisa (nol)',
            showConfirmButton: false,
            timer: 1500
        });
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

    let subtotalVar = ukuranIni * qty.value;
    let ini = "" + subtotalVar;

    subTotal.value = "Rp."+subtotalVar;
    btnTokeranjang.addEventListener('click', addToKeranjang);
}


const btnAddToKeranjangModal = document.querySelector('#btnAddBarangToKeranjangModal');

btnAddToKeranjangModal.addEventListener('click', () => {
    const namaBarang = RowAddQty.querySelector('#NamBarList');
    const qtyFromList = RowAddQty.querySelector('#iniQty');
    const UkuranBarang = RowAddQty.querySelector('#pilihanUkuran');
    const SubTotalFromInp = RowAddQty.querySelector('#subTotal');

    let ukuranIni;
    if (UkuranBarang.value == '1') {
        ukuranIni = 60000 * 1;
    } else if (UkuranBarang.value == '1/2') {
        ukuranIni = 60000 * 1 / 2;
    } else  if (UkuranBarang.value == '1/4') {
        ukuranIni = 60000 * 1 / 4;
    } else if (UkuranBarang.value == '3000') {
        ukuranIni = 3000;
    } else {
        ukuranIni = 60000
    }
    qtyFromList.value = 1;

    let subtotalVar = ukuranIni * qtyFromList.value;
    let ini = "" + subtotalVar;

    SubTotalFromInp.value = "Rp."+subtotalVar;

    btnTokeranjang.addEventListener('click', addToKeranjang); 
    qtyFromList.addEventListener('keypress', GetSubTotal); 
    qtyFromList.addEventListener('change', GetSubTotal); 
});

statusInput.addEventListener('change', () => {
    const tipeBayar = document.querySelector('#tipe_bayar');

    if (statusInput.value == 'cashbond') { 
        tipeBayar.setAttribute('disabled', '');
        tipeBayar.setAttribute('value', 'null');
    } else {
        tipeBayar.removeAttribute('disabled');
    }
});
