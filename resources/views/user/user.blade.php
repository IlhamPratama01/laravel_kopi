@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('native/css/style.css') }}">
    <div class="row bg-color:blue;">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Pilihan Menu</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            @foreach ($data as $produk)
                @if ($produk->status === 'aktif')
                    <div class="col-md-4">
                        <div class="card mb-3" style="width: 18rem;">
                            <div class="geeks">
                                <img src="{{ asset('fotoproduk/' . $produk->gambar) }}" class="card-img-top"
                                    style="object-fit: cover; object-position: center;height: 310px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                                <p class="card-text, text-justify">{{ $produk->deskripsi }}</p>
                                <p>Rp. {{ $produk->harga }}</p>
                                <form action="/pesan/{{ $produk->id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-info">Beli</button>
                            </div>
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <script>
        AOS.init();
    </script>
    </body>
@endsection
