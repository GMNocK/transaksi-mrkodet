// var Modal Barang
const btnTokeranjang = document.querySelector("#btnAddToKeranjang");
const AddBarangModal = document.querySelector('#addBarangModal');

//  var modal edit

// var Tbl keranjang
const tBodyKeranjang = document.querySelector('#Keranjang tbody')

const totalBayar = document.querySelector('#totalHarga');

// const modalEdit = document.querySelector('#editBarangDariKeranjang .modal-body ');
const modalEditForm = document.querySelector('#editBarangDariKeranjang .modal-body form');

const panjangDetail = document.getElementsByName('panjang')[0];

let panjang = parseInt(panjangDetail.value) ;
let totalForInput = 0;
let editedRow = 0;


document.addEventListener('DOMContentLoaded', function () {
    for (let i = 1; i < panjang; i++) {
        let subtotal = document.getElementsByName('subtotal' + i)[0];
        
        // var totalForInput = 0;
        // console.log(totalForInput);
        totalForInput += parseInt((subtotal.value).slice(3, (subtotal.value).length));
        totalBayar.value = 'Rp.' + totalForInput;
    }
});

function GetSubTotal() {
    if (editedRow == 0) {
        
        const qty = AddBarangModal.querySelector('#iniQty');
        const subTotal = AddBarangModal.querySelector('#subTotal');
        const ukuran = AddBarangModal.querySelector('#pilihanUkuran');
    
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
    
        let subtotalVar = ukuranIni * qty.value
    
        subTotal.value = 'Rp.' + subtotalVar;

    } else if (editedRow != '') {
        const qty = modalEditForm.querySelector('#QtyEdit');
        const subTotal = modalEditForm.querySelector('#subTotalEdit');
        const ukuran = modalEditForm.querySelector('#ukuranEdit');

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
        
        let subtotalVar = ukuranIni * qty.value
    
        subTotal.value = 'Rp.' + subtotalVar;
        
    } else {

    }

}


function addToKeranjang() {
    let buat = 1;
    const TrTable = document.createElement('tr');

    const tdInpNo = document.createElement('td');
    const tdInpNamBar = document.createElement('td');
    const tdInpHarSatuan = document.createElement('td');
    const tdInpUkuranBar = document.createElement('td');
    const tdInpJmlBar = document.createElement('td');
    const tdInpSubTot = document.createElement('td');
    const tdIconEdit = document.createElement('td');
    
    addIconTblkeranjang(tdIconEdit);

    addAtributTd( tdInpNo, tdInpNamBar,  tdInpHarSatuan,  tdInpUkuranBar,  tdInpJmlBar, tdInpSubTot);

    const InpNamBar = document.createElement('input');
    const InpHarSatuan = document.createElement('input');
    const InpUkuranBar = document.createElement('input');
    const InpJmlBar = document.createElement('input');
    const InpSubTot = document.createElement('input');
    
    const isisubtot = document.querySelector('#subTotal');
    let dariSubtot = ""+ isisubtot.value;
    let subtot = parseInt(dariSubtot.slice(3,dariSubtot.length));

    addAtributInput( InpNamBar, InpHarSatuan, InpUkuranBar, InpJmlBar, InpSubTot);

    addValueInp(InpNamBar, InpHarSatuan, InpUkuranBar, InpJmlBar, InpSubTot, subtot);

    const isiTblKer = tBodyKeranjang.querySelectorAll('tr');

    if (isiTblKer != null) {
        isiTblKer.forEach((item) => {
    
            const tdInambar = item.querySelector('td .nama-barang');
            // const tdhbar = item.querySelector('td .harga-barang');
            const tdIukbar = item.querySelector('td .ukuran-barang');
            const tdIqty = item.querySelector('td .jumlah-beli');
            const tdIsubtot = item.querySelector('td .sub-total');
            
            // Ambil Angka dari subtot
            let subtotKeranjang = "" + tdIsubtot.value;
            let hasilSubtot = parseInt(subtotKeranjang.slice(3,subtotKeranjang.length));

            const qtyFromModal = AddBarangModal.querySelector('#iniQty');

            if (tdInambar != null && tdIukbar.value != null) {

                if (tdInambar.value == InpNamBar.value && tdIukbar.value == InpUkuranBar.value) {
                    tdIqty.value = parseInt(tdIqty.value) + parseInt(qtyFromModal.value);
                    
                    tdIsubtot.value = "Rp."+ (hasilSubtot + parseInt(subtot));

                    buat = 0;
                    panjang -= 1;
                }

            } 
            
        });
    }



    if (buat == 1) {
        
        // Function Buat icon di td;
    
        tdInpNamBar.appendChild(InpNamBar);
        tdInpHarSatuan.appendChild(InpHarSatuan);
        tdInpUkuranBar.appendChild(InpUkuranBar);
        tdInpJmlBar.appendChild(InpJmlBar);
        tdInpSubTot.appendChild(InpSubTot);
    
        TrTable.appendChild(tdInpNo);
        TrTable.appendChild(tdInpNamBar);
        TrTable.appendChild(tdInpHarSatuan);
        TrTable.appendChild(tdInpUkuranBar);
        TrTable.appendChild(tdInpJmlBar);
        TrTable.appendChild(tdInpSubTot);
        TrTable.appendChild(tdIconEdit);
    
        tBodyKeranjang.appendChild(TrTable);
    }

    let getTotalBayar = ""+ totalBayar.value;
    let hasilTotalBayar = parseInt(getTotalBayar.slice(3,getTotalBayar.length));
    totalBayar.value = "Rp." + (subtot + hasilTotalBayar);
    panjangDetail.value = panjang + 1;
}

iconRender();
let editIcon = document.querySelectorAll('.fa-edit');
editIcon.forEach((item) => {
    item.addEventListener('click', sendEditData);
});

function iconRender() {
    let deleteIcon = document.querySelectorAll('.fa-trash-alt');

    deleteIcon.forEach((item) => {
        item.addEventListener('click', function () {
            let td = this.parentNode;
            let tr = td.parentNode;
            
            tBodyKeranjang.removeChild(tr);

            const subtot = parseInt(tr.querySelector('.sub-total').value.slice(3, this.length));

            let getTotalBayar = ""+ totalBayar.value;
            let hasilTotalBayar = parseInt(getTotalBayar.slice(3,getTotalBayar.length));
            totalBayar.value = "Rp." + ((hasilTotalBayar - subtot));
        })
    });
}


function sendEditData() {
    const btnEditItem = document.querySelector('#btnEditItemKeranjang');
    btnEditItem.addEventListener('click', setItemEdit);

    let td = this.parentNode;
    let tr = td.parentNode;
    editedRow = tr;

    const namaBarang = tr.querySelector('td .nama-barang');
    const ukuranBarang = tr.querySelector('td .ukuran-barang');
    const jumlahBeli = tr.querySelector('td .jumlah-beli');
    const subTotal = tr.querySelector('td .sub-total');

    const selectUkuranBarang = modalEditForm.querySelector('#ukuranEdit');
    const optionNamaBarang = modalEditForm.querySelector('#barangEdit option');
    const inputUkuranEdit = modalEditForm.querySelector('#ukuranEdit option');
    const inputQtyEdit = modalEditForm.querySelector('#QtyEdit');
    const inputSubtotalEdit = modalEditForm.querySelector('#subTotalEdit');

    optionNamaBarang.value = namaBarang.value;
    optionNamaBarang.setAttribute('selected','');
    optionNamaBarang.innerHTML = namaBarang.value;

    // inputUkuranEdit.value = ukuranBarang.value;
    // inputUkuranEdit.setAttribute('selected','');
    // inputUkuranEdit.innerHTML = ukuranBarang.value + ' Kg';

    // let isiUkuran = '1/2 Kg';
    // const option = document.createElement('option');
    // option.value = isiUkuran;
    // option.innerHTML = isiUkuran;
    
    // selectUkuranBarang.appendChild(option);
    
    // const option2 = document.createElement('option');
    // isiUkuran = '1 Kg';
    // option2.value = isiUkuran;
    // option2.innerHTML = isiUkuran;
    // selectUkuranBarang.appendChild(option2);
    
    // const option3 = document.createElement('option');
    // isiUkuran = '3000';
    // option3.value = isiUkuran;
    // option3.innerHTML = isiUkuran;
    // selectUkuranBarang.appendChild(option3);

    inputQtyEdit.value = jumlahBeli.value;
    inputSubtotalEdit.value = subTotal.value;
}



function setItemEdit() {
    const inputNamaBarang = modalEditForm.querySelector('#barangEdit');
    const inputUkuranEdit = modalEditForm.querySelector('#ukuranEdit');
    const inputQtyEdit = modalEditForm.querySelector('#QtyEdit');
    const inputSubtotalEdit = modalEditForm.querySelector('#subTotalEdit');

    const DataSet = editedRow.querySelectorAll('td');

    const namaBarang = editedRow.querySelector('td .nama-barang');
    const ukuranBarang = editedRow.querySelector('td .ukuran-barang');
    const jumlahBeli = editedRow.querySelector('td .jumlah-beli');
    const subTotal = editedRow.querySelector('td .sub-total');

    let subtotalAwal = (""+subTotal.value).slice(3,this.length);

    namaBarang.value = inputNamaBarang.value;
    ukuranBarang.value = inputUkuranEdit.value;
    jumlahBeli.value = inputQtyEdit.value;
    subTotal.value = inputSubtotalEdit.value;

    let dariSubtot = ""+ subTotal.value;
    let subtot = parseInt(dariSubtot.slice(3,dariSubtot.length));

    let getTotalBayar = ""+ totalBayar.value;
    let hasilTotalBayar = parseInt(getTotalBayar.slice(3,getTotalBayar.length));
    totalBayar.value = "Rp." + ((subtot + hasilTotalBayar) - subtotalAwal);

    editedRow = 0;
}

function addIconTblkeranjang(tdIconEdit) {

    const iconEdit = document.createElement('i');
    const iconDelete = document.createElement('i');

    tdIconEdit.classList.add('text-center');

    iconEdit.classList.add('fa');
    iconEdit.classList.add('fa-edit');
    iconEdit.classList.add('link');
    iconEdit.style.cursor = 'pointer';

    iconEdit.setAttribute('data-bs-toggle', 'modal');
    iconEdit.setAttribute('data-bs-target', '#editBarangDariKeranjang');

    iconDelete.classList.add('fa');
    iconDelete.classList.add('fa-trash-alt');
    iconDelete.classList.add('link');
    iconDelete.style.cursor = 'pointer';
    
    iconEdit.addEventListener('click', sendEditData);
    iconDelete.addEventListener('click', iconRender);
    tdIconEdit.appendChild(iconEdit);
    tdIconEdit.appendChild(iconDelete);
}

function addAtributTd(tdNo, tdNambar, tdHarSat, tdUkBar, tdJmlBar, tdSubTot) {
    
    tdNo.classList.add('text-center');
    tdNambar.classList.add('text-center');
    tdHarSat.classList.add('text-center');
    tdUkBar.classList.add('text-center');
    tdJmlBar.classList.add('text-center');
    tdSubTot.classList.add('text-center');

    tdNo.innerHTML = panjang;
}

function addAtributInput(InpNamBar, InpHarSatuan, InpUkuranBar, InpJmlBar, InpSubTot) {
    InpNamBar.setAttribute('readonly', '');

    InpHarSatuan.setAttribute('readonly', '');

    InpUkuranBar.setAttribute('readonly', '');

    InpJmlBar.setAttribute('readonly', '');

    InpSubTot.setAttribute('readonly', '');

    InpNamBar.classList.add('text-dark');
    InpHarSatuan.classList.add('text-dark');
    InpUkuranBar.classList.add('text-dark');
    InpJmlBar.classList.add('text-dark');
    InpSubTot.classList.add('text-dark');

    InpNamBar.classList.add('text-center');
    InpHarSatuan.classList.add('text-center');
    InpUkuranBar.classList.add('text-center');
    InpJmlBar.classList.add('text-center');
    InpSubTot.classList.add('text-center');

    InpNamBar.classList.add('border-0');
    InpHarSatuan.classList.add('border-0');
    InpUkuranBar.classList.add('border-0');
    InpJmlBar.classList.add('border-0');
    InpSubTot.classList.add('border-0');

    InpNamBar.classList.add('bg-transparent');
    InpHarSatuan.classList.add('bg-transparent');
    InpUkuranBar.classList.add('bg-transparent');
    InpJmlBar.classList.add('bg-transparent');
    InpSubTot.classList.add('bg-transparent');

    InpNamBar.classList.add('nama-barang');
    InpHarSatuan.classList.add('harga-barang');
    InpUkuranBar.classList.add('ukuran-barang');
    InpJmlBar.classList.add('jumlah-beli');
    InpSubTot.classList.add('sub-total');

    InpNamBar.setAttribute('name', 'BR' + panjang );
    InpHarSatuan.setAttribute('name', 'harga' + panjang );
    InpUkuranBar.setAttribute('name', 'ukuran' + panjang );
    InpJmlBar.setAttribute('name', 'jumlah' + panjang );
    InpSubTot.setAttribute('name', 'subtotal' + panjang );
    panjang += + 1;

}

function addValueInp(InpNamBar, InpHarSatuan, InpUkuranBar, InpJmlBar, InpSubTot, subtotalvalue) {
    const isinambar = document.querySelector('#NamBarModal');
    // harga Satuan Buat manual if statement
    const isiukbar = document.querySelector('#pilihanUkuran');
    const isijml = document.querySelector('#iniQty');

    InpNamBar.setAttribute('value', isinambar.value);
    InpHarSatuan.setAttribute('value', 'Rp.'+60000);
    InpUkuranBar.setAttribute('value', isiukbar.value);
    InpJmlBar.setAttribute('value', isijml.value);
    InpSubTot.setAttribute('value', 'Rp.'+subtotalvalue);
}







btnTokeranjang.addEventListener('click', addToKeranjang);
