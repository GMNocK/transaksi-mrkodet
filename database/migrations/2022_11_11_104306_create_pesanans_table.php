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
            $table->timestamp('waktu_pesan');
            $table->integer('total_harga');
            $table->string('tipe_kirim');
            $table->string('tipePembayaran'); 
            // transfer, cod, tunai
            $table->string('status')->default('belum dibaca');
            // belum dibaca, dibaca, diproses, dikirim, selesai
            $table->string('kode')->unique();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}
