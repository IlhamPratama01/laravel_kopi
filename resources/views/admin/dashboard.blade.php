@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('native/css/style.css') }}">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Welcome back, Manager</h2>
                        <p class="mb-md-0">Your analytics dashboard.</p>
                    </div>
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                        <p class="text-primary mb-0 hover-cursor">Analytics</p>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
                        <i class="mdi mdi-download text-muted"></i>
                    </button>
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                        <i class="mdi mdi-clock-outline text-muted"></i>
                    </button>
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                        <i class="mdi mdi-plus text-muted"></i>
                    </button>
                    <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body dashboard-tabs p-0">
                    <ul class="nav nav-tabs px-4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview"
                                role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sales-tab" data-bs-toggle="tab" href="#sales" role="tab"
                                aria-controls="sales" aria-selected="false">Sales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="purchases-tab" data-bs-toggle="tab" href="#purchases" role="tab"
                                aria-controls="purchases" aria-selected="false">Purchases</a>
                        </li>
                    </ul>
                    <div class="tab-content py-0 px-0">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel"
                            aria-labelledby="overview-tab">
                            <div class="d-flex flex-wrap justify-content-xl-between">
                                <div
                                    class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-calendar-heart icon-lg me-3 text-primary"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Start date</small>
                                        <a class="btn btn-secondary p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium"
                                            href="#" role="button" id="dropdownMenuLinkA" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            @if ($data->isNotEmpty())
                                                @php
                                                    $latestTransaksi = $data->sortByDesc('id_transaksi')->first();
                                                    $waktuTerbesar = $latestTransaksi->waktu;
                                                    $formattedWaktu = \Carbon\Carbon::parse($waktuTerbesar)->format('j F Y');
                                                @endphp
                                            @endif
                                            <h5 class="mb-0 d-inline-block">{{ $formattedWaktu }}</h5>
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-currency-usd me-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Transaksi</small>
                                        <h5 class="me-2 mb-0">
                                            Rp.{{ $transaksi->where('status', 'Selesai')->sum('grandtotal') }}</h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-eye me-3 icon-lg text-success"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Total views</small>
                                        <h5 class="me-2 mb-0">{{ $user->where('role', 'user')->count('id') }}</h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-checkbox-marked-circle-outline me-3 icon-lg text-warning"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Transaksi Sukses</small>
                                        <h5 class="me-2 mb-0">{{ $transaksi->where('status', 'Selesai')->count('id') }}</h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-package-variant me-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Produk</small>
                                        <h5 class="me-2 mb-0">{{ count($data) }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                            <div class="d-flex flex-wrap justify-content-xl-between">
                                <div
                                    class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-calendar-heart icon-lg me-3 text-primary"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Start date</small>
                                        <a class="btn btn-secondary p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium"
                                            href="#" role="button" id="dropdownMenuLinkA"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if ($data->isNotEmpty())
                                                @php
                                                    $latestTransaksi = $data->sortByDesc('id_transaksi')->first();
                                                    $waktuTerbesar = $latestTransaksi->waktu;
                                                    $formattedWaktu = \Carbon\Carbon::parse($waktuTerbesar)->format('j F Y');
                                                @endphp
                                            @endif
                                            <h5 class="mb-0 d-inline-block">{{ $formattedWaktu }}</h5>
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-checkbox-marked-circle-outline me-3 icon-lg text-warning"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Transaksi Sukses</small>
                                        <h5 class="me-2 mb-0">{{ $transaksi->where('status', 'Selesai')->count('id') }}
                                        </h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-eye me-3 icon-lg text-success"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Total views</small>
                                        <h5 class="me-2 mb-0">{{ $user->where('role', 'user')->count('id') }}</h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-currency-usd me-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Transaksi</small>
                                        <h5 class="me-2 mb-0">
                                            Rp.{{ $transaksi->where('status', 'Selesai')->sum('grandtotal') }}</h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-package-variant me-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Produk</small>
                                        <h5 class="me-2 mb-0">{{ count($data) }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="purchases" role="tabpanel" aria-labelledby="purchases-tab">
                            <div class="d-flex flex-wrap justify-content-xl-between">
                                <div
                                    class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-calendar-heart icon-lg me-3 text-primary"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Start date</small>
                                        <a class="btn btn-secondary p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium"
                                            href="#" role="button" id="dropdownMenuLinkA"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if ($data->isNotEmpty())
                                                @php
                                                    $latestTransaksi = $data->sortByDesc('id_transaksi')->first();
                                                    $waktuTerbesar = $latestTransaksi->waktu;
                                                    $formattedWaktu = \Carbon\Carbon::parse($waktuTerbesar)->format('j F Y');
                                                @endphp
                                            @endif
                                            <h5 class="mb-0 d-inline-block">{{ $formattedWaktu }}</h5>
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-currency-usd me-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Transaksi</small>
                                        <h5 class="me-2 mb-0">
                                            Rp.{{ $transaksi->where('status', 'Selesai')->sum('grandtotal') }}</h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-eye me-3 icon-lg text-success"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Total views</small>
                                        <h5 class="me-2 mb-0">{{ $user->where('role', 'user')->count('id') }}</h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-checkbox-marked-circle-outline me-3 icon-lg text-warning"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Transaksi Sukses</small>
                                        <h5 class="me-2 mb-0">{{ $transaksi->where('status', 'Selesai')->count('id') }}
                                        </h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-package-variant me-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Produk</small>
                                        <h5 class="me-2 mb-0">{{ count($data) }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Produk dengan penjualan terbanyak</p>
                    <h1>{{ $transaksi->groupBy('nama_produk')->map(function ($item, $pro) {
                            return ['nama_produk' => $pro, 'jumlah_pembelian' => $item->sum('jumlah')];
                        })->sortByDesc('jumlah_pembelian')->first()['nama_produk'] }}
                    </h1>
                    <h4>Dengan jumlah penjualan</h4>
                    <h5>{{ $transaksi->groupBy('nama_produk')->map(function ($item, $pro) {
                            return ['nama_produk' => $pro, 'jumlah_pembelian' => $item->sum('jumlah')];
                        })->sortByDesc('jumlah_pembelian')->first()['jumlah_pembelian'] }}
                        Cangkir</h5>
                    <div id="cash-deposits-chart-legend" class="d-flex justify-content-center pt-3"></div>
                    <p class="card-title">Jumlah penjualan kopi hari ini </p>
                    <h1>{{ $transaksi->sum('jumlah') }} Cangkir </h1>
                </div>
            </div>
        </div>
        <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Transaksi Penjualan </p>
                    <h1>Rp.{{ $transaksi->sum('grandtotal') }}</h1>
                    <h4>Penghasilan anda hari ini</h4>
                    <p class="text-muted">Penghasilan kotor, yang belum termasuk pengeluaran modal Anda.</p>
                    <div id="total-sales-chart-legend"></div>
                </div>
                <canvas id="total-sales-chart"></canvas>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-center">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © bootstrapdash.com
                2023</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best Bootstrap dashboard
                templates</span>
        </div>
    </footer>
    <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
@endsection
