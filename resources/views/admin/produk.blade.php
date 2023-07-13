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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />
</head>
  <body>
      <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="me-md-3 me-xl-5">
            <h2>Welcome  Admin,</h2>
            <p class="mb-md-0">Your analytics tables Produk.</p>
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
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <form class="d-flex" action="/admin/produk" >
    <input class="form-control me-1" type="search" name="search" placeholder="Masukan Kata Kunci Pencarian" >
    </form>
    <br>
    
    <div class="col-md-12 text-end"> 
      <div data-aos="flip-up" data-aos-duration="2000">
    <a class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-3 text-center mr-1 mb-2" style="margin-left: 5px;" href='/admin/form/'><i class="fas fa-square-plus"></i> Tambah Produk</a></div></div><br>
      <div data-aos="fade-up-left" data-aos-duration="1500">
                  <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">                       
                    </div>
                  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                              IMAGE
                            </th>
                            <th scope="col" class="px-6 py-3">
                              PRODUK
                            </th>
                            <th scope="col" class="px-6 py-3">
                              DESKRIPSI
                            </th>
                            <th scope="col" class="px-6 py-3">
                              HARGA
                            </th>
                            <th scope="col" class="px-6 py-3">
                              STOK
                            </th>
                            <th scope="col" class="px-6 py-3">
                              STATUS
                            </th>
                            <th scope="col" class="px-6 py-3">
                              ACTION
                            </th>
                        </tr>
                    </thead>
                    @foreach ($data as $produk)
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="pl-0">
                                    <div class="text-base font-semibold">{{ $produk->id }}</div>
                                </div>  
                            </th>
                            <td class="px-6 py-4">
                              <img class="w-10 h-10 rounded-full" src="{{ asset('fotoproduk/'.$produk->gambar) }}" style="width: 40px">
                            </td>
                            <td class="px-6 py-4">
                              {{ $produk->nama_produk }}
                          </td>
                            <td class="px-6 py-4">
                              {{ $produk->deskripsi }}
                            </td>
                            <td class="px-6 py-4">
                              {{ $produk->harga }}
                            </td>
                            <td class="px-6 py-4">
                              {{ $produk->stok }}
                            </td>
                            <td class="px-6 py-4">
                              @if($produk->status == 'aktif')
                              <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Aktif
                            </div>
                              @else
                              <div class="flex ">
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Non-Aktif
                            </div>    
                              @endif
                            </td>
                            <td class="px-6 py-4 items-center">
                              <a class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-3 py-2.5 text-center mr-3 mb-3" href='/produk/ubah/{{ $produk->id }}'><i class="fas fa-pencil"></i></a>
                              @method('delete')
                              {{ csrf_field() }}
                              <a class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center mr-3 mb-3" onClick="return confirmDelete(event)" href="/destroy/{{ $produk->id }}"><i class="fas fa-trash "></i></a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                {{ $data->links() }}
              </div>
<!-- Scrolling animaton -->
</html>
@endsection

