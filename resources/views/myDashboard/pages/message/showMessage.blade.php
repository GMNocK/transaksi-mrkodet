@extends('myDashboard.App')

@section('content')
    
<div class="row justify-content-center">
    <div class="col-9">
        <div class="card flex-fill">
            <div class="card-header">
                <div class="row justify-content-center">
                    <div class="col-10 text-center">
                        <span class="align-middle mb-1 me-1" data-feather="message-square"></span>
                        <p class="d-inline fs-4 fw-semibold" style="letter-spacing: .025em">Pesan</p>
                    </div>
                </div>
            </div>
            <div class="card-body mt-3">
                <div class="fs-3 fw-semibold">
                    {{ $pesan->title }}
                </div>
                <div class="body mt-4 fs-4 fw-normal">
                    <span class="fw-semibold">Isi Pesan</span>
                    <p class="mt-2">
                        {{ $pesan->detail }}
                    </p>
                </div>
            </div>
            <div class="card-footer ">
                <div class="row">
                    <div class="col-6">
                        @if ($pesan->user_id != '')

                            <span class="fs-5 text-primary fw-normal">
                                From : {{ $pesan->pengirim[0]->user->username }}
                            </span>

                        @else

                            <span class="fs-5 text-primary fw-normal">
                                From : Application
                            </span>

                        @endif 
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-end">
                            <a id="delete" href="#" data-id={{ $pesan->id }} class="btn btn-danger text-white">
                                <i class="fas fa-trash-alt me-1"></i>
                                Hapus
                            </a>
                            <a href="/message" class="btn btn-primary mx-2 text-white">
                                <i class="fa fa-arrow-left me-1" aria-hidden="true"></i>
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const btnDelete = document.querySelector('#delete');

        const id = btnDelete.getAttribute('data-id');

        btnDelete.addEventListener('click', () => {
        const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-danger mx-2'
                },
                buttonsStyling: false
            })
    
            swalWithBootstrapButtons.fire({
            title: 'Hapus Notif?',
            text: "Notifikasi Akan Dihapus Permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak, Batalkan!',
            reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/notif/delete/"+id+""
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Tidak Dihapus',
                    'Notifikasi Akan tetap ada',
                    'info'
                    )
                }
            })
        });  
    });
</script>

@endsection