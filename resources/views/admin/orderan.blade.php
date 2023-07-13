@extends('layouts.admin')
@section('content')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('native/css/style.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />

<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between flex-wrap">
      <div class="d-flex align-items-end flex-wrap">
        <div class="me-md-3 me-xl-5">
          <h2>Orderan Pesanan</h2>
          <p class="mb-md-0">Your analytics Pesanan.</p>
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


<div class="relative">
  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
      
  </div>
  <div class="my-3 p-3 bg-body rounded shadow-sm">
  <div data-aos="fade-left" data-aos-duration="1500">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  ID
              </th>
              <th scope="col" class="px-6 py-3">
                  Nama
              </th>
              <th scope="col" class="px-6 py-3">
                  Tanggal Pesanan
              </th>
              <th scope="col" class="px-6 py-3">
                  Nama Produk
              </th>
              <th scope="col" class="px-6 py-3">
                  Jumlah
              </th>
              <th scope="col" class="px-6 py-3">
                  Total
              </th>
              <th scope="col" class="px-6 py-3">
                  Status Orderan
              </th>
          </tr>
      </thead>
      @foreach ($data as $transaksi)
      @if($transaksi->status === 'Proses')
      <tbody>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                  <div class="pl-0">
                      <div class="text-base font-semibold">{{ $transaksi->id_transaksi }}</div>
                  </div>  
              </th>
              <td class="px-6 py-4">
                {{ $transaksi->name }}
              </td>
              <td class="px-6 py-4">
               {{ $transaksi->waktu}}
            </td>
              <td class="px-6 py-4">
                {{ $transaksi->nama_produk }}
              </td>
              <td class="px-6 py-4">
                {{ $transaksi->jumlah }}
              </td>
              <td class="px-6 py-4">
                {{ $transaksi->grandtotal }}
              </td>
              <td class="px-6 py-4">
                @if($transaksi->status === 'Proses')
                <a href="/admin/ubah/{{ $transaksi->id_transaksi }}" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Proses</a>
                @else
                <a href="/admin/ubah/{{ $transaksi->id_transaksi }}" class="btn btn-sm btn-success" >Selesai</a>    
                @endif
              </td>
          </tr>
      </tbody>
      @endif
      @endforeach
  </table>
</div>
<!-- Scrolling animaton -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
  </script>
@endsection
