@extends('layouts.master')
@section('content')
<h1>Daftar Produk</h1>
<hr>
<a href="/product/create" type="button" class="btn btn-primary mb-3">Tambah Data</a>
<div class="alert alert-primary"> 
<b>Nama Toko : </b>{{ $data_toko['nama_toko'] }}
  <br>
<b>Alamat : </b>{{ $data_toko['alamat'] }}
  <br>
  <b>Tipe Toko : </b>{{ $data_toko['type'] }}
</div>
@if (session('message'))
<div class="alert alert-primary">{{ session('message') }}</div> {{----}}
@endif
{{-- Kartu utama untuk daftar produk --}}
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">Daftar Produk
      <div class="d-flex gap-2">
         {{-- Jika ada keyword pencarian di URL, maka tampilkan tombol reset --}}
        @if (Request()->keyword != '')
        <a href="/product" class="btn btn-info">Reset</a>
        @endif
        {{-- Form pencarian produk --}}
        <form class="input-group" style="width: 350px">
          <input type="text" class="form-control" name="keyword" placeholder="Cari data produk">
          <button class="btn btn-success" type="submit" id="button-addon2">Cari Data</button>
        </form>
      </div>
    </div>
    

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
    @forelse ($data_produk as $item )
      <tr>
        <th scope="row">{{ $loop->iteration }}</th> {{-- Menampilkan nomor urut --}}
        <td>{{ $item->nama_produk }}</td>  {{-- Menampilkan nama produk --}}
        <td>{{ $item->harga }}</td> {{-- Menampilkan harga produk --}}
        <td>{{ $item->deskripsi_produk }}</td> {{-- Menampilkan deskripsi produk --}}
        <td>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus{{ $item->id_produk }}">
            Hapus
          </button>

            {{-- <button type="button" class="btn btn-danger">Hapus</button> --}}
          <a href="/product/{{ $item->id_produk }}/edit" class="btn btn-warning">Edit</a>
          <a href="/product/{{ $item->id_produk }}" type="button" class="btn btn-info">Detail</a>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="5" class="text-center">Data yang anda cari tidak ada!</td>
      </tr>
    @endforelse
  
  </tbody>
</table>
  </div>
</div>


<!-- Modal untuk konfirmasi hapus produk -->
<!-- Modal -->
 @foreach ($data_produk as $item)
<div class="modal fade" id="hapus{{ $item->id_produk }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="/product/{{ $item->id_produk }}" method="post" class="modal-content">
      @csrf
      @method('DELETE')
      {{-- Menggunakan metode DELETE untuk menghapus data produk --}}
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus produk{{ $item->nama_produk }}??
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger">Hapus Data</button>
      </div>
    </div>
  </div>
</div>
 @endforeach
@endsection