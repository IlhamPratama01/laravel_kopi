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
<h1>Edit Role</h1>
<div class="my-3 p-3 bg-body rounded shadow-sm">
<div class="col-md-12 text-end"> 
      <a href="/manager/role" class="btn btn-warning" style="margin-left: 10px;"> Kembali </a>
</div>
        
@foreach ($data as $user)
            <form action="/role/edit" method="post">
              {{ csrf_field() }}           
              <div class="row mb-3">
                <div class="col-md-6 mb-3">
                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                <div class="col">
                  <input type="text" class="form-control" name='name' required="required" value="{{ $user->name }}" >
                </div>
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col">
                  <input type="text" class="form-control" name='email' required="required" value="{{ $user->email }}" >
                </div>
              </div>
                  <div class="col-md-6 mb-3">
                <label for="role" class="col-sm-2 col-form-label" id="role">Role</label>
                <div class="col">
                  <select class="form-select" aria-label="Default select example" id="role" name="role" required="required">                        
                    <option selected>--Pilih Role--</option>
                    <option value="manager">Manager</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>                
                </select>
              </div>  
            </div>
          </div>
          <div class="col-md-12 text-end">  
            <input type="submit" class="btn btn-info my-3" style="margin-left: 10px;" value="Simpan Data">     
         </form>
         @endforeach
</body>
</html>
@endsection