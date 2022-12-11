// Buat Validasi Btn Laporan Excel DLL

const btnExcel = document.querySelector('#btnExcel');
const btnPdf = document.querySelector('#btnPdf');
const btnCetak = document.querySelector('#btnCetak');

btnExcel.addEventListener('click', ()=>{
    const isiData = btnExcel.getAttribute('data-');

    if (isiData == "[]") {        
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success mx-2',
                cancelButton: 'btn btn-danger mx-2'
            },
            buttonsStyling: false
        })
        
        swalWithBootstrapButtons.fire({
            title: 'Laporan Data Kosong?',
            text: "Buat Laporan Excel Dengan Data Kosong?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Buat!',
            cancelButtonText: 'Tidak, Jangan!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/DataPelanggan/export/excel?data=pelanggan"            
                
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire({
                    title: 'Di Batalkan',
                    icon: 'error',
                })
            }
        })
    } else {
        window.location = "/DataPelanggan/export/excel?data=pelanggan"
    }

});

btnPdf.addEventListener('click', ()=>{
    const isiData = btnExcel.getAttribute('data-');

    if (isiData == "[]") {        
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success mx-2',
                cancelButton: 'btn btn-danger mx-2'
            },
            buttonsStyling: false
        })
        
        swalWithBootstrapButtons.fire({
            title: 'Laporan Data Kosong?',
            text: "Buat Laporan Pdf Dengan Data Kosong?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Buat!',
            cancelButtonText: 'Tidak, Jangan!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/DataPelanggan/export/pdf?data=pelanggan"            
                
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire({
                    title: 'Di Batalkan',
                    icon: 'error',
                })
            }
        })
    } else {
        window.location = "/DataPelanggan/export/pdf?data=pelanggan"
    }

});

btnCetak.addEventListener('click', ()=>{
    const isiData = btnExcel.getAttribute('data-');

    if (isiData == "[]") {        
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success mx-2',
                cancelButton: 'btn btn-danger mx-2'
            },
            buttonsStyling: false
        })
        
        swalWithBootstrapButtons.fire({
            title: 'Laporan Gagal Dimuat',
            text: "Data Kosong!",
            icon: 'warning',
        })
    } else {
        const formCetak = document.querySelector('#formCetak');
        formCetak.submit();
    }

});