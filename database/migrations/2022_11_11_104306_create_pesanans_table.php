<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id')->constrained()->cascadeOnDelete();
            $table->dateTime('waktu_pesan');
            $table->integer('total_harga');
            $table->string('tipe_kirim');
            $table->string('tipePembayaran'); 
            // transfer, cod, tunai
            $table->tinyInteger('status')->default(1);
            // belum dibaca, dibaca, diterima, diproses, dikirim, selesai, batal
            //      1,          2,      3,       4,         5,       6,     0   
            // sesuai urutan alias nomernya
            $table->boolean('bukti')->default(false);
            $table->text('keterangan')->nullable();
            $table->uuid('kode')->unique();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}
