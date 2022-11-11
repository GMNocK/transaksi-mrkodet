@extends('myDashboard.App')

@section('content')
    
        <div class="col-md-12 col-lg-12 col-xxl-8 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="ms-2 col-md-4">

                        <a href="/pelanggan/pesanan/create" class="link-secondary d-flex align-items-center">
                            <i class="align-middle me-1 link-secondary" data-feather="plus-circle"></i>
                            <h6 class="card-title mb-0 link-secondary">Pesan Barang</h6>
                        </a>
                    </div>
                </div>

                <div class="table-responsive col-12 mb-5">
                    <table class="table table-hover my-0">
                        <thead class="bg-secondary text-white shadow-sm">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col" class="">Start Date</th>
                                <th scope="col" class="">End Date</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="">Assignee</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Project Apollo</td>
                                <td class="">01/01/2021</td>
                                <td class="">31/06/2021</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td class="">Vanessa Tucker</td>
                            </tr>
                            <tr>
                                <td>Project Fireball</td>
                                <td class="">01/01/2021</td>
                                <td class="">31/06/2021</td>
                                <td><span class="badge bg-danger">Cancelled</span></td>
                                <td class="">William Harris</td>
                            </tr>
                            <tr>
                                <td>Project Hades</td>
                                <td class="">01/01/2021</td>
                                <td class="">31/06/2021</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td class="">Sharon Lessman</td>
                            </tr>
                            <tr>
                                <td>Project Nitro</td>
                                <td class="">01/01/2021</td>
                                <td class="">31/06/2021</td>
                                <td><span class="badge bg-warning">In progress</span></td>
                                <td class="">Vanessa Tucker</td>
                            </tr>
                            <tr>
                                <td>Project Phoenix</td>
                                <td class="">01/01/2021</td>
                                <td class="">31/06/2021</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td class="">William Harris</td>
                            </tr>
                            <tr>
                                <td>Project X</td>
                                <td class="">01/01/2021</td>
                                <td class="">31/06/2021</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td class="">Sharon Lessman</td>
                            </tr>
                            <tr>
                                <td>Project Romeo</td>
                                <td class="">01/01/2021</td>
                                <td class="">31/06/2021</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td class="">Christina Mason</td>
                            </tr>
                            <tr>
                                <td>Project Wombat</td>
                                <td class="">01/01/2021</td>
                                <td class="">31/06/2021</td>
                                <td><span class="badge bg-warning">In progress</span></td>
                                <td class="">William Harris</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection