@extends('layouts.admin')
@section('content')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('native/css/style.css') }}">
        {{-- Icon Print --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        {{-- Tailwind  --}}
      <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />
    
    
</head>
  <body>
      <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="me-md-3 me-xl-5">
            <h2>Welcome  Manager,</h2>
            <p class="mb-md-0">Your analytics tables Pemesanan.</p>
          </div>
          <div class="d-flex">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Analytics</p>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="my-2 p-3 bg-body rounded shadow-sm">
  <div class="col-md-12 text-end"> 
    <div class="my-2 p-3 bg-body rounded shadow-sm">
      <div data-aos="flip-up" data-aos-duration="2000">
      <a href="/pembelian/cetak_pdf" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 mb-3" style="margin-left: 5px;" target="blank"><strong>Cetak PDF</strong> <i class='fas fa-print'></i> </a></div><br>
    <div data-aos="fade-left" data-aos-duration="1500">
      <table border="1" class="table table-striped" data-export-title="Data Akun">
        <thead style="background-color: yellow;">            
            <tr>
                <th>Id</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Tanggal/Jam</th>
                <th class="text-center">Nama Produk</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Total</th>
            </tr>
        </thead>
        @foreach ($data as $transaksi)
        @if($transaksi->status === 'Selesai')
        <tbody>
            <tr>
                <td>{{ $transaksi->id_transaksi }}</td>
                <td class="text-center">{{ $transaksi->name }}</td>
                <td class="text-center">{{ $transaksi->waktu }}</td>
                <td class="text-center">{{ $transaksi->nama_produk }}</td>
                <td class="text-center">{{ $transaksi->jumlah }}</td>
                <td class="text-center">{{ $transaksi->grandtotal }}</td>
                </td>
            </tr>                
        </tbody>
        @endif
        @endforeach
    </table>
    {{ $data->links() }}
</div>
<!-- Scrolling animaton -->

</body>
</html>
@endsection
