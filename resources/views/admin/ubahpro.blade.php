@extends('layouts.admin')

@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('native/css/style.css') }}">
        <title>Ubah Role</title>
    </head>

    <body>
        <h1>Edit Produk</h1>
        <div class="my-2 p-3 bg-body rounded shadow-sm">
            <div class="col-md-12 text-end">
                <a href="/admin/produk" class="btn btn-warning" style="margin-left: 10px;"> Kembali </a>
            </div>

            @foreach ($data as $produk)
                <form action="/produk/edit" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row mb-3">
                        <div class="col-md-8 mb-3">
                            <label for="nama_produk" class="col-sm-2 col-form-label">Id</label>
                            <div class="col">
                                <input type="text" class="form-control" name='id' required="required"
                                    value="{{ $produk->id }}">
                            </div>
                            <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                            <div class="col">
                                <input type="text" class="form-control" name='nama_produk' required="required"
                                    value="{{ $produk->nama_produk }}">
                            </div>
                            <label for="nama_produk" class="col col-form-label">Deskripsi</label>
                            <div class="col">
                                <input type="text" class="form-control" name='deskripsi' required="required"
                                    value="{{ $produk->deskripsi }}">
                            </div>
                            <label for="email" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col">
                                <input type="text" class="form-control" name='harga' required="required"
                                    value="{{ $produk->harga }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                                <div class="col">
                                    <input type="stok" class="form-control" name='stok' required="required"
                                        value="{{ $produk->stok }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="stok" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col">
                                        <select class="form-select" aria-label="Default select example" name="status"
                                            required="required">
                                            <option selected>{{ $produk->status }}</option>
                                            <option value="aktif">Aktif</option>
                                            <option value="non-aktif">Non-aktif</option>
                                        </select>
                                    </div>
                                </div>
                                <label for="gambar" class="col-sm-2 col-form-label" id="gambar">Gambar</label>
                                <div class="col">
                                    <input class="form-control" name="gambar" type="file" id="gambar"
                                        value="{{ $produk->gambar }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-end">
                        <input type="submit" class="btn btn-info my-3" onclick="sukses()" style="margin-left: 10px;"
                            value="Simpan Data">
                </form>
            @endforeach
    </body>

    </html>
@endsection
