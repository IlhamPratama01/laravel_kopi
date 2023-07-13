@extends('layouts.admin')

@section('content')

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('native/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/v4-duotone.min.css">
    <title>Ubah Role</title>
  </head>
    <body>
<h1>Tambah Produk</h1>
<div class="my-3 p-3 bg-body rounded shadow-sm">
<div class="col-md-12 text-end"> 
      <a href="/admin/produk" class="btn btn-warning" style="margin-left: 10px;">Kembali </a>
</div>
            <form action="/admin/submit" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}           
              <div class="row mb-3">
                <div class="col-md-12 mb-3">
                <label for="nama_produk" class="col col-form-label">Nama Produk</label>
                <div class="col">
                  <input type="text" class="form-control" name='nama_produk' required="required" >
                </div>
                <label for="nama_produk" class="col col-form-label">Deskripsi</label>
                <div class="col">
                  <input type="text" class="form-control" name='deskripsi' required="required" >
                </div>
                <label for="email" class="col-sm-2 col-form-label">Harga</label>
                <div class="col">
                  <input type="text" class="form-control" name='harga' required="required"  >
                </div>
                  <div class="col-md-6 mb-3">
                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                <div class="col">
                  <input type="stok" class="form-control" name='stok' required="required" >
                </div>
                <label for="gambar" class="col-sm-2 col-form-label" id="gambar">Gambar</label>
                <div class="col">
                        <input class="form-control" name='gambar' type="file" id="formFile">
                      </div>
              </div>  
            </div>
          </div>
          <div class="col-md-12 text-end">  
            <input type="submit" class="btn btn-info my-3"  style="margin-left: 10px;" value="Simpan Data">
         </form>
        
</body>
</html>
@endsection