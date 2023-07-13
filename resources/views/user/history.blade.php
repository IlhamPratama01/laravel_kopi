@extends('layouts.admin')
@section('content')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('native/css/style.css') }}">
<h1>History Pesanan</h1>
<div class="my-2 p-3 bg-body rounded shadow-sm">
    <table border="1" class="table table-striped" >
        <thead style="background-color: rgb(35, 218, 59);">
            <tr>
                <th>Id</th>
                <th class="text-center">Tanggal Pesanan</th>
                <th class="text-center">Nama Produk</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        @php
         $sortedData = $data->sortByDesc('id_transaksi');
        @endphp
        @foreach ($sortedData as $transaksi)
        <tbody>
            <tr>
                <td>{{ $transaksi->id_transaksi }}</td>
                <td class="text-center">{{ $transaksi->waktu}}</td>   
                <td class="text-center">{{ $transaksi->nama_produk }}</td>
                <td class="text-center">{{ $transaksi->jumlah }}</td>
                <td class="text-center">
                    @if($transaksi->status == 'Proses')
                  <a class="btn btn-sm btn-warning">Proses</a>
                  @else
                  <a class="btn btn-sm btn-success" >Selesai</a>    
                  @endif
                  </td>
            </tr>                
        </tbody>
        @endforeach
    </table>
</div>

@endsection
