@extends('layouts.master')
{{-- Meng-extend layout utama 'master' agar tampilan konsisten di seluruh halaman. --}}

@section('content')
{{-- Mendefinisikan section 'konten' yang akan diisi pada layout master. --}}

    <h1>Detail Produk</h1>
    {{-- Judul halaman. --}}

    <hr>
    <div class="card">
        <div class="card-header">
            Detail Produk Kami
            {{-- Header card, menampilkan judul daftar produk. --}}
        </div>
        <div class="card-body">
            <img src="https://placehold.co/600x400" class="img-fluid" alt="...">
            <p>Nama Produk : {{ $produk->nama_produk }} </p>
            <p>Harga : Rp.{{ $produk->harga }} </p>
            <p>Deskripsi : {{ $produk->deskripsi_produk }}</p>
            <p>Kategori : Barang Elektronik</p>
            <p>Stok : Tersedia 7</p>
            <a href="/product" type="button" class="btn btn-primary">Kembali Ke Product</a>
        </div>
    </div>
@endsection
{{-- Penutup section 'konten'. --}}