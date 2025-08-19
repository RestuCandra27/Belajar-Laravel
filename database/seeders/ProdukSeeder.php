<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //query untuk mengisi data awal pada tabel produk
        DB::table('tb_produks')->insert([
            [
            'nama_produk'=>'Kulkas 100 pintu',
            'harga'=>'15000000',
            'deskripsi_produk'=>'Ini adalah deskripsi dummy',
            'kategori_id'=>'2',
            'created_at'=>now()
        ],[
             'nama_produk'=>'Laptop Gaming',
            'harga'=>'17000000',
            'deskripsi_produk'=>'Ini adalah deskripsi dummy',
            'kategori_id'=>'2',
            'created_at'=>now()
        ],[
             'nama_produk'=>'jam tangan pintar',
            'harga'=>'200000',
            'deskripsi_produk'=>'Ini adalah deskripsi dummy',
            'kategori_id'=>'2',
            'created_at'=>now()
        ]
        ]);
    }
}
