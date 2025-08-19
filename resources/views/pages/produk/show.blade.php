@extends('layouts.master')
@section('content')
<h1>Daftar Produk</h1>
<hr>
<a href="/product/create" type="button" class="btn btn-primary mb-3">Tambah Data</a>
<!--Menampilkan tombol biru dengan teks "Tambah Data", yang mengarah ke URL /product/tambah. 
 Kelas Bootstrap btn btn-primary memberikan gaya tombol, dan mb-3 memberi margin bawah.-->
<div class="alert alert-primary"> 
<b>Nama Toko : </b>{{ $data_toko['nama_toko'] }}
<!-- Menampilkan teks "Nama Toko:" dan nilainya dari variabel $nama_toko yang dikirim dari controller. -->
  <br>
<b>Alamat : </b>{{ $data_toko['alamat'] }}
<!-- Menampilkan teks "Alamat:" dan nilainya dari variabel $alamat.-->
  <br>
  <b>Tipe Toko : </b>{{ $data_toko['type'] }}
<!-- Menampilkan teks "Tipe Toko:" dan nilainya dari variabel $type.-->
</div>
@if (session('message'))
<div class="alert alert-primary">{{ session('message') }}</div>
@endif
<div class="card">
    <div class="card-header">Daftar Produk</div>
  <div class="card-body">
    <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Stok</th>
      <th scope="col">Harga</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  {{-- Melakukan perulangan untuk setiap data produk yang dikirim dari controller --}}
    @foreach ($data_produk as $item )
      <tr>
        <th scope="row">{{ $loop->iteration }}</th> {{-- Menampilkan nomor urut --}}
        <td>{{ $item->nama_produk }}</td>  {{-- Menampilkan nama produk --}}
        <td>{{ $item->harga }}</td> {{-- Menampilkan harga produk --}}
        <td>{{ $item->deskripsi }}</td> {{-- Menampilkan deskripsi produk --}}
        <td>
          <button type="button" class="btn btn-danger">Hapus</button>
          <button type="button" class="btn btn-warning">Edit</button>
          <a href="/product/{{ $item->id_produk }}" type="button" class="btn btn-info">Detail</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
  </div>
</div>
@endsection