<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />
    <link rel="stylesheet" href="sweetalert2.min.css">

    <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/r-2.4.1/datatables.min.css" rel="stylesheet"/>

</head>

    @livewireStyles
</head>
<body>

    <div class="container-scroller">
        @include('layouts.inc.admin.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('layouts.inc.admin.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                @yield('content')
                </div>
            </div>
    
        </div>
    </div>
    
    <script src="{{ asset('admin/vendors/base/vendor.bundle.base.js') }}"></script>

    <script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>

    <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/js/template.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/r-2.4.1/datatables.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
<script>
    AOS.init();
</script>
<script>
    function sukses(){
        Swal.fire({
  position: 'top-center',
  icon: 'success',
  title: 'Data berhasil disimpan',
  showConfirmButton: false,
  timer: 1500
});
    }

    function hapus(id) {
    Swal.fire({
        title: 'Hapus data?',
        text: "Anda yakin ingin menghapus data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel' // Tambahkan tombol Cancel
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect ke URL penghapusan saat pengguna mengklik "Yes, delete it!"
            window.location.href = "/destroy/" + id;
        }
    });
}


    function ubah(id){
        Swal.fire({
        title: 'Edit data?',
        text: "Anda yakin ingin mengubah data ini!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, edit it!',
        cancelButtonText: 'Cancel' // Tambahkan tombol Cancel
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect ke URL penghapusan saat pengguna mengklik "Yes, delete it!"
            window.location.href = href="/produk/ubah/" + id;
        }
    });
    }
</script>
    @livewireScripts
</body>
</html>