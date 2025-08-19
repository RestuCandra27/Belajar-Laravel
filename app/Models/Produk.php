<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Produk extends Model
{
    //innisialisasi model produk
    protected $table = 'tb_produks'; // Nama tabel yang digunakan oleh model ini

    //inisialisasi kunci primer
    protected $primaryKey = 'id_produk'; // Kunci primer tabel ini

    //inisialisasi data yang dapat kita isi
    //protected $fillable = ['nama_produk', 'harga', 'stok']; // Kolom yang dapat diisi secara massal

    //inisialisasi data yang tidak dapat kita isi
    protected $guarded = ['id_produk']; // Kolom yang tidak dapat diisi secara massal, kosong berarti semua kolom bisa diisi
}
