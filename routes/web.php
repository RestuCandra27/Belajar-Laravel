<?php
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

//untuk mengarahkan ke halaman beranda
Route::get('/', function () {
    return view('pages.beranda');
});// Membuat route GET ke URL '/', menampilkan view 'pages.beranda'

//untuk mengarahkan ke halaman about
Route ::get('/about', function () {
    //mengirim data ke halaman about
    return view('pages.about',[
        'nama' => 'John Doe',
        'umur' => 30,
        'alamat' => 'Konoha',
    ]);
});// Membuat route GET ke '/about', menampilkan view 'pages.about' dan mengirim data nama, umur, alamat

//untuk mengarahkan ke halaman about dengan parameter
route::get('/about/{id}/detail', function($id){
    //mengirim data ke halaman detail
    return view('pages.detail',[
        'nomer' => $id 
    ]);
});// Membuat route GET ke '/about/{id}/detail', menerima parameter {id}, menampilkan view 'pages.detail' dan mengirim data nomer = $id

//untuk mengarahkan ke halaman contact
Route::view('/contact', 'pages.contact');// Membuat route GET ke '/contact', langsung menampilkan view 'pages.contact' tanpa controller/closure

// Rekomendasi urutan
Route::get('/product', [ProdukController::class, 'index']);// Ini untuk menampilkan daftar produk
Route::get('/product/create', [ProdukController::class, 'create']);// Ini untuk menampilkan form tambah produk
Route::post('/product', [ProdukController::class, 'store']);// Ini untuk menyimpan data produk baru
Route::get('/product/{id}', [ProdukController::class, 'show']); // Ini terakhir

route::get('/product/{id}/edit', [ProdukController::class, 'edit']);// Ini untuk menampilkan form edit produk
route::put('/product/{id}', [ProdukController::class, 'update']);// Ini untuk memperbarui data produk yang sudah ada

Route::delete('/product/{id}', [ProdukController::class, 'destroy']);// Ini untuk menghapus produk berdasarkan ID