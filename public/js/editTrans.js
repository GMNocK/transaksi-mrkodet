// var Modal Barang
const btnTokeranjang = document.querySelector("#btnAddToKeranjang");
const AddBarangModal = document.querySelector('#addBarangModal');

// var Tbl keranjang
const tBodyKeranjang = document.querySelector('#Keranjang tbody')

const totalBayar = document.querySelector('#totalHarga');

function GetSubTotal() {
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

    subTotal.value = subtotalVar;
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
    console.log(subtot);

    addAtributInput( InpNamBar, InpHarSatuan, InpUkuranBar, InpJmlBar, InpSubTot);

    addValueInp(InpNamBar, InpHarSatuan, InpUkuranBar, InpJmlBar, InpSubTot, isisubtot);

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

                if (tdInambar.value == InpNamBar.value && tdIukbar.value == InpUkuranBar.value) {
                    tdIqty.value = parseInt(tdIqty.value) + 1;
                    
                    tdIsubtot.value = "Rp."+ (hasilSubtot + parseInt(dariSubtot));

                    buat = 0;               
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
    console.log(hasilTotalBayar + "   " + getTotalBayar);
    totalBayar.value = "Rp." + (subtot + hasilTotalBayar);
}



function addIconTblkeranjang(tdIconEdit) {

    const icon = document.createElement('i');
    
    tdIconEdit.classList.add('text-center');
    
    icon.classList.add('fa');
    icon.classList.add('fa-edit');
    icon.classList.add('link');
    
    tdIconEdit.appendChild(icon);
}

function addAtributTd(tdNo, tdNambar, tdHarSat, tdUkBar, tdJmlBar, tdSubTot) {
    
    tdNo.classList.add('text-center');
    tdNambar.classList.add('text-center');
    tdHarSat.classList.add('text-center');
    tdUkBar.classList.add('text-center');
    tdJmlBar.classList.add('text-center');
    tdSubTot.classList.add('text-center');
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

}

function addValueInp(InpNamBar, InpHarSatuan, InpUkuranBar, InpJmlBar, InpSubTot, subtotalvalue) {
    const isinambar = document.querySelector('#NamBarModal');
    // harga Satuan Buat manual if statement
    const isiukbar = document.querySelector('#pilihanUkuran');
    const isijml = document.querySelector('#iniQty');

    InpNamBar.setAttribute('value', isinambar.value);
    InpHarSatuan.setAttribute('value', 60000);
    InpUkuranBar.setAttribute('value', isiukbar.value);
    InpJmlBar.setAttribute('value', isijml.value);
    InpSubTot.setAttribute('value', subtotalvalue);
}







btnTokeranjang.addEventListener('click', addToKeranjang);
