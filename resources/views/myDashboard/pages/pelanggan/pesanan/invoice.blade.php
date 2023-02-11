<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice - Pesanan</title>

    <style>
        .box-invoice {
<<<<<<< HEAD
            width: 235px;
            background: red
        }
    </style>
=======
            width: 370px;
        }
        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 2.5em 3em; 
            text-align: center;
        }
        .isi {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .body-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .footer {
            display: flex;
            justify-content: end;
            align-items: center;
        }
        .qty {
            width: 40px;
            text-align: center;
        }
        .barang {
            width: 140px;
            text-align: center;
        }
        .isi-total {
            margin-left: 28px;
        }
        .kode {
            text-align: center;
            margin-top: 25px;
        }
        .tgl {
            text-align: right;
        }
        .penutup {
            padding: 0 50px;
            text-align: center;
            margin-top: 40px;   
        }
    </style>    
>>>>>>> 0e69660d567db3ee639853bd99b2d7ce4f972757
</head>
<body>
    <div class="box-invoice">
        <div class="header">
            Mister Kodet
            <br>
<<<<<<< HEAD
            
=======
            Cimahi, Cimahi Selatan, Cibeber komplek pemda 2 blok b no. 14
        </div>
        <div class="tgl">
            {{ $pesanan->waktu_pesan }}
        </div>
        <hr>
        <div class="body">
            <div class="body-header">
                <div class="barang">
                    Nama Barang
                </div>
                <div class="ukuran">
                    Ukuran
                </div>
                <div class="qty">
                    Qty
                </div>
                <div class="subtot">
                    Sub Total
                </div>
            </div>
            @foreach ($pesanan->detail_pesanan as $d)
            <div class="isi">
                <div class="barang">
                    {{ $d->barang->nama_barang }}
                </div>
                <div class="ukuran">
                    @if ($d->ukuran != '3000')                        
                        {{ $d->ukuran }} .Kg
                    @else
                        {{ $d->ukuran }} Ribu
                    @endif
                </div>
                <div class="qty">
                    {{ $d->jumlahPesan }}
                </div>
                <div class="subtot">
                    Rp.{{ number_format($d->subtotal) }}
                </div>
            </div>
            @endforeach
        </div>
        <hr>
        <div class="footer">
            <div class="total">
                Total Pembayaran
            </div>
            <div class="isi-total">
                {{ $pesanan->total_harga }}
            </div>
        </div>
        <div class="kode">
            {{ $pesanan->kode }}
        </div>
        <hr>
        <div class="penutup">
            Terima Kasih Telah Melakukan Pemesanan
>>>>>>> 0e69660d567db3ee639853bd99b2d7ce4f972757
        </div>
    </div>
</body>
</html>