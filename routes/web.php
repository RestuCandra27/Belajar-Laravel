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
Route::get('/product', [ProdukController::class, 'index']);
Route::get('/product/create', [ProdukController::class, 'create']);
Route::post('/product', [ProdukController::class, 'store']);
Route::get('/product/{id}', [ProdukController::class, 'show']); // Ini terakhir
