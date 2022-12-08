<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('detail');
            $table->string('potongan');
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('kategori_notif_id')->constrained()->cascadeOnDelete();
            $table->foreignId('pesanan_id')->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
