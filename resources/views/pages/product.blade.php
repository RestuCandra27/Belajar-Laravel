@extends('layouts.master')
{{-- Menggunakan layout utama 'master' sebagai template --}} 

@section('content')
{{-- Mendefinisikan section 'content' yang akan diisi pada layout master --}}

<h1>Daftar Produk</h1>

<hr>
<button type="button" class="btn btn-primary mb-3">Tambah Data</button>

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

    <tr>
      <th scope="row">1</th>
      <td>Laptop Axio</td>
      <td>25</td>
      <td>300000000</td>
      <td>
        <button type="button" class="btn btn-danger">Hapus</button>
        <button type="button" class="btn btn-warning">Edit</button>
      </td>
    </tr> 
    <tr>
      <th scope="row">1</th>
      <td>Laptop Lenovo</td>
      <td>25</td>
      <td>300000000</td>
      <td>
        <button type="button" class="btn btn-danger">Hapus</button>
        <button type="button" class="btn btn-warning">Edit</button>
      </td>
    </tr> 
    <tr>
      <th scope="row">1</th>
      <td>Laptop ROG</td>
      <td>25</td>
      <td>300000000</td>
      <td>
        <button type="button" class="btn btn-danger">Hapus</button>
        <button type="button" class="btn btn-warning">Edit</button>
      </td>
    </tr> 
    <tr>
      <th scope="row">1</th>
      <td>Laptop Acer</td>
      <td>25</td>
      <td>300000000</td>
      <td>
        <button type="button" class="btn btn-danger">Hapus</button>
        <button type="button" class="btn btn-warning">Edit</button>
      </td>
    </tr> 
    <tr>
      <th scope="row">1</th>
      <td>Laptop Asus</td>
      <td>25</td>
      <td>300000000</td>
      <td>
        <button type="button" class="btn btn-danger">Hapus</button>
        <button type="button" class="btn btn-warning">Edit</button>
      </td>
    </tr> 
  </tbody>
</table>
  </div>
</div>


@endsection
