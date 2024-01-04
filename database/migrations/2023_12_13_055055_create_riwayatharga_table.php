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
        Schema::create('riwayatharga', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->references('id')->on('product')->onDelete('cascade');
            // $table->foreignId('barang_id')->references('id')->on('product');
            $table->double('harga_beli');
            $table->double('harga_jual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayatharga');
    }
};
