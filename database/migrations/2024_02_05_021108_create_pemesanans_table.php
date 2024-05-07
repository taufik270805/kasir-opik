<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('pemesanans', function (Blueprint $table) {
        $table->id();
        // $table->unsignedBigInteger('category_id');
        $table->date('tanggal_pemesanan', 50);
        $table->string('jam_mulai', 50);
        $table->string('jam_selesai', 50);
        $table->integer('nama_pemesanan', 50)->autoIncrement(false);
        $table->integer('jumlah_pelanggan', 50)->autoIncrement(false);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
