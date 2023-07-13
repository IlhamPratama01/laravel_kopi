@extends('layouts.admin')

@section('content')

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('native/css/style.css') }}">
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>
  <body>
      <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="me-md-3 me-xl-5">
            <h2>Welcome  Manager,</h2>
            <p class="mb-md-0">Your analytics tables user.</p>
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
    <form class="d-flex" action="/manager/role" >
    <input class="form-control me-1" type="search" name="search" placeholder="Masukan Kata Kunci Pencarian" >
    </form>
                <br>
                <div data-aos="fade-left" data-aos-duration="1500">
        <table border="1" class="table table-striped" >
            <thead style="background-color: yellow;">
                 <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th> 
                    <th>Role</th>
                    <th class="text-center">Opsi</th>
                 </tr>
             </thead>           
             @foreach ($data as $user)            
        <tr>
            <tbody>
            <td>{{ $user->id }}</td>         
            <td>{{ $user->name }}</td> 
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td class="text-center">
                <a class="btn btn-warning" href='role/ubah/{{ $user->id }}'><i class="mdi mdi-pencil "></i></a>
                    @method('delete')
                    {{ csrf_field() }}
                <a class= "btn btn-danger" onClick="return confirmDelete(event)" href="/hapus/{{ $user->id }}"><i class="mdi mdi-delete "></i></a>
              </td>
        </tr> 
            @endforeach
        </tbody>
        </body>
        </table>
        {{ $data->links() }}
        
</div>

<!-- Scrolling animaton -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
  </script>
</html>
@endsection

