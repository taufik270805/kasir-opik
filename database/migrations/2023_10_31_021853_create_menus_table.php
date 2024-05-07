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
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('category_id');
            $table->string('nama', 50);
            // $table->string('harga', 50);
            $table->string('image', 50);
            $table->string('deskripsi', 50);
            $table->foreignId('jenis_id');
            $table->float('harga_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
