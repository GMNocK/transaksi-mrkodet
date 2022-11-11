<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPesanansTable extends Migration
{
    public function up()
    {
        Schema::create('detail__pesanans', function (Blueprint $table) {
            $table->foreignId('pesanan_id')->constrained()->cascadeOnDelete();
            $table->foreignId('barang_id')->constrained()->cascadeOnDelete();
            $table->integer('hargaPerKg');
            $table->integer('jumlahPesan');
            $table->integer('subTotal');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('detail__pesanans');
    }
}
