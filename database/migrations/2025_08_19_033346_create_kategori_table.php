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
        Schema::create('tb_kategori', function (Blueprint $table) {
            $table->id('id_kategori'); // Membuat kolom 'id_kategori' sebagai kunci primer
            $table->string('nama_kategori', 100);// Membuat kolom 'nama_kategori' dengan panjang 100 karakter
            $table->text('deskripsi'); // Membuat kolom 'deskripsi' untuk menyimpan deskripsi kategori
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori');
    }
};
