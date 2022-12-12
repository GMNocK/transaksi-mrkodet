@extends('myDashboard.App')

@section('content')    

    <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

    <div class="row">
        <div class="col-xl-6 col-xxl-5 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-6">
                        
                        @cannot('pelanggan')
                            
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Pelanggan</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $pelanggan }}</h1>
                                <div class="mb-0">
                                    <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                    <span class="text-muted">Since last week</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Transaksi</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="shopping-bag"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $transaksi }}</h1>
                                <div class="mb-0">
                                    <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
                                    <span class="text-muted">Since last week</span>
                                </div>
                            </div>
                        </div>
                        
                        @endcannot
                        
                        @can('pelanggan')
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Laporan Anda</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $laporanSaya }}</h1>
                                <div class="mb-0">
                                    <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                    <span class="text-muted">Since last week</span>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Karyawan</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $karyawan }}</h1>
                                <div class="mb-0">
                                    <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                    <span class="text-muted">Since last week</span>
                                </div>
                            </div>
                        </div>
                        @endcan
                        
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Barang</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="box"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $barang }}</h1>
                                <div class="mb-0">
                                    <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
                                    <span class="text-muted">Since last week</span>
                                </div>
                            </div>
                        </div>

                        @can('pelanggan')                            
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Pesanan</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="shopping-cart"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $pesananSaya }}</h1>
                                <div class="mb-0">
                                    <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
                                    <span class="text-muted">Since last week</span>
                                </div>
                            </div>
                        </div>
                        @endcan

                        @cannot('pelanggan')
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Pesanan</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="shopping-cart"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $pesanan->count() }}</h1>
                                <div class="mb-0">
                                    <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
                                    <span class="text-muted">Since last week</span>
                                </div>
                            </div>
                        </div>
                        @endcannot
                        
                    </div>
                </div>
            </div>
        </div>
        
        @cannot('pelanggan')                
            <div class="col-xl-6 col-xxl-7">
                <div class="card flex-fill w-100">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Recent Transaksi Last Year</h5>
                    </div>
                    <div class="card-body py-3">
                        <div class="chart chart-sm">
                            <canvas id="chartjs-dashboard-line"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        @endcannot

        @can('pelanggan')
            <div class="col-xl-6 col-xxl-7">
                <div class="card flex-fill w-100">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Pesanan</h5>
                    </div>
                    <div class="card-body py-3">
                        <div class="chart chart-sm">
                            <canvas id="chartjs-dashboard-line-pelanggan"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        
        @cannot('pelanggan')
        <div class="row">
            
            
            <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
                <div class="card flex-fill w-100">
                    <div class="card-header">
        
                        <h5 class="card-title mb-0">Tipe Pembayaran Pesanan</h5>
                    </div>
                    <div class="card-body d-flex">
                        <div class="align-self-center w-100">
                            <div class="py-3">
                                <div class="chart chart-xs">
                                    <canvas id="chartjs-dashboard-pie"></canvas>
                                </div>
                            </div>
        
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <td>{{ "Cash On Delivery" }}</td>
                                        <td class="text-end">{{ $pesananCOD }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ "Transfer" }}</td>
                                        <td class="text-end">{{ $pesananTransfer }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
                <div class="card flex-fill">
                    <div class="card-header">
                        
                        <h5 class="card-title mb-0">Calendar</h5>
                    </div>
                    <div class="card-body d-flex">
                        <div class="align-self-center w-100">
                            <div class="chart">
                                <div id="datetimepicker-dashboard"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        
                        <h5 class="card-title mb-0">Pesanan Bulan lalu</h5>
                    </div>
                    <div class="card-body px-4">
                        <canvas id="pesanan-line" style="height:350px;"></canvas>
                    </div>
                </div>
            </div>
            
            
            
        </div>
        @endcannot
        
        <div class="row">
            <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Pesanan Terakhir</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th class="">Tanggal Pesan</th>
                                <th class="">Total Harga</th>
                                <th class="text-center">Status Pesanan</th>
                                <th class="">Assignee</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesananTerakhir as $i)                                    
                            <tr>
                                <td>{{ $i->pelanggan->nama }}</td>
                                <td class="">{{ $i->waktu_pesan }}</td>
                                <td class="">{{ $i->total_harga }}</td>
                                <td class="text-center">
                                    @if ($i->status == '1')
                                    
                                    <span class="badge bg-secondary fs-6">
                                            Belum dibaca
                                        </span>
                                        
                                        @else
    
                                        @if ($i->status == '2')
                                        
                                        <span class="badge bg-info fs-6">
                                            Di Baca
                                        </span>     
    
                                        @endif
                                        
                                        @if ($i->status == '3')
                                        
                                        <span class="badge bg-success fs-6">
                                            Di Terima
                                            </span>                                        
                                            
                                            @endif
                                            
                                            @if ($i->status == '4')
                                            
                                            <span class="badge bg-warning fs-6">
                                                Pesanan Di Proses
                                            </span>                                        
                                            
                                            @endif
                                            
                                            @if ($i->status == '5')
                                            
                                            <span class="badge bg-primary bg-opacity-75 fs-6">
                                                Dikirim Ke tempat Tujuan
                                            </span>                                        
                                            
                                            @endif
                                            
                                            @if ($i->status == '6')
                                            
                                            <span class="badge bg-primary fs-6">
                                                Selesai
                                            </span>                                        
                                            
                                            @endif
                                            
                                            @if ($i->status == '0')
                                            
                                            <span class="badge bg-danger fs-6">
                                                Batal
                                            </span>                                        
                                            
                                            @endif
                                            
                                            @endif
                                        </td>
                                        <td class="">{{ $i->tipePembayaran }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 col-xxl-3 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    
                    <h5 class="card-title mb-0">Monthly Sales</h5>
                </div>
                <div class="card-body d-flex w-100">
                    <div class="align-self-center chart chart-lg">
                        <canvas id="chartjs-dashboard-bar"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    @cannot('pelanggan')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
                var gradient = ctx.createLinearGradient(0, 0, 0, 225);
                gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
                gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
                // Line chart
                new Chart(document.getElementById("chartjs-dashboard-line"), {
                    type: "line",
                    data: {
                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                        datasets: [{
                            label: "Sales ($)",
                            fill: true,
                            backgroundColor: gradient,
                            borderColor: window.theme.primary,
                            data: [
                                {{ $transJan }},
                                {{ $transFeb }},
                                {{ $transApr }},
                                {{ $transMar }},
                                {{ $transMei }},
                                {{ $transJun }},
                                {{ $transJul }},
                                {{ $transAug }},
                                {{ $transSep }},
                                {{ $transOct }},
                                {{ $transNov }},
                                {{ $transDes }}
                            ]
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        tooltips: {
                            intersect: false
                        },
                        hover: {
                            intersect: true
                        },
                        plugins: {
                            filler: {
                                propagate: false
                            }
                        },
                        scales: {
                            xAxes: [{
                                reverse: true,
                                gridLines: {
                                    color: "rgba(0,0,0,0.0)"
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    stepSize: 1000
                                },
                                display: true,
                                borderDash: [3, 3],
                                gridLines: {
                                    color: "rgba(0,0,0,0.0)"
                                }
                            }]
                        }
                    }
                });
            });
        </script>

        
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Pie chart
                new Chart(document.getElementById("chartjs-dashboard-pie"), {
                    type: "pie",
                    data: {
                        labels: ["COD", "Transfer"],
                        datasets: [{
                            data: [{{ $pesananCOD }}, {{ $pesananTransfer }}],
                            backgroundColor: [
                                window.theme.primary,
                                window.theme.warning,
                            ],
                            borderWidth: 5
                        }]
                    },
                    options: {
                        responsive: !window.MSInputMethodContext,
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        cutoutPercentage: 75
                    }
                });
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var ctx = document.getElementById("pesanan-line").getContext("2d");
                var gradient = ctx.createLinearGradient(0, 0, 0, 225);
                gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
                gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
                // Line chart
                new Chart(document.getElementById("pesanan-line"), {
                    type: "line",
                    data: {
                        labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
                        datasets: [{
                            label: "Sales ($)",
                            fill: true,
                            backgroundColor: gradient,
                            borderColor: window.theme.primary,
                            data: [
                                {{ $pesan1 }},
                                {{ $pesan2 }},
                                {{ $pesan3 }},
                                {{ $pesan4 }},
                                {{ $pesan5 }},
                                {{ $pesan6 }},
                                {{ $pesan7 }},
                                {{ $pesan8 }},
                                {{ $pesan9 }},
                                {{ $pesan10 }},
                                {{ $pesan11 }},
                                {{ $pesan12 }},
                                {{ $pesan13 }},
                                {{ $pesan14 }},
                                {{ $pesan15 }},
                                {{ $pesan16 }},
                                {{ $pesan17 }},
                                {{ $pesan18 }},
                                {{ $pesan19 }},
                                {{ $pesan20 }},
                                {{ $pesan21 }},
                                {{ $pesan22 }},
                                {{ $pesan23 }},
                                {{ $pesan24 }},
                                {{ $pesan25 }},
                                {{ $pesan26 }},
                                {{ $pesan27 }},
                                {{ $pesan28 }},
                                {{ $pesan29 }},
                                {{ $pesan30 }},
                                {{ $pesan31 }},
                            ]
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        tooltips: {
                            intersect: false
                        },
                        hover: {
                            intersect: true
                        },
                        plugins: {
                            filler: {
                                propagate: false
                            }
                        },
                        scales: {
                            xAxes: [{
                                reverse: true,
                                gridLines: {
                                    color: "rgba(0,0,0,0.0)"
                                }
                            }],
                            yAxes: [{
                                // ticks: {
                                //     stepSize: 1000
                                // },
                                // display: true,
                                // borderDash: [3, 3],
                                // gridLines: {
                                //     color: "rgba(0,0,0,0.0)"
                                // }
                            }]
                        }
                    }
                });
            });

        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
                var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
                document.getElementById("datetimepicker-dashboard").flatpickr({
                    inline: true,
                    prevArrow: "<span title=\"Previous month\">&laquo;</span>",
                    nextArrow: "<span title=\"Next month\">&raquo;</span>",
                    defaultDate: defaultDate
                });
            });
        </script>
    @endcannot

    @can('pelanggan')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById("chartjs-dashboard-line-pelanggan").getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line-pelanggan"), {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Sales ($)",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.primary,
                        data: [
                            {{ $transJan }},
                            {{ $transFeb }},
                            {{ $transApr }},
                            {{ $transMar }},
                            {{ $transMei }},
                            {{ $transJun }},
                            {{ $transJul }},
                            {{ $transAug }},
                            {{ $transSep }},
                            {{ $transOct }},
                            {{ $transNov }},
                            {{ $transDes }}
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        intersect: false
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                stepSize: 1000
                            },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }]
                    }
                }
            });
        });
    </script>
    @endcan


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Bar chart
            new Chart(document.getElementById("chartjs-dashboard-bar"), {
                type: "bar",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "This year",
                        backgroundColor: window.theme.primary,
                        borderColor: window.theme.primary,
                        hoverBackgroundColor: window.theme.primary,
                        hoverBorderColor: window.theme.primary,
                        data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                        barPercentage: .75,
                        categoryPercentage: .5
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false
                            },
                            stacked: false,
                            ticks: {
                                stepSize: 20
                            }
                        }],
                        xAxes: [{
                            stacked: false,
                            gridLines: {
                                color: "transparent"
                            }
                        }]
                    }
                }
            });
        });
    </script>
    


    @if (session('loginOk'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Welcome {{ auth()->user()->username }}',
                    showConfirmButton: false,
                    timer: 1400
                })
            })
        </script>
    @endif



@endsection
