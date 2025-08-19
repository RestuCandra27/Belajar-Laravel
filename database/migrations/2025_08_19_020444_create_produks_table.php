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
        //sintaks untuk membuat tabel 'produks'
        Schema::create('tb_produks', function (Blueprint $table) {
            $table->id('id_produk'); // Membuat kolom 'id_produk' sebagai kunci primer
            $table->string('nama_produk', 150); // Membuat kolom 'nama_produk' dengan panjang 150 karakter
            $table->integer('harga'); // Membuat kolom 'harga' untuk menyimpan harga produk
            $table->text('deskripsi_produk'); // Membuat kolom 'deskripsi_produk' untuk menyimpan deskripsi produk
            $table->integer('kategori_id'); // Membuat kolom 'kategori_id' yang dapat bernilai null

            $table->timestamps();// Menambahkan kolom 'created_at' dan 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
