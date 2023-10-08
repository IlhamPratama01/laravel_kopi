@extends('layouts.admin')
@section('content')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('native/css/style.css') }}">
    <h1>Keranjang</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="my-2 p-3 bg-body rounded shadow-sm">
        <table border="1" class="table table-striped">
            <thead style="background-color: rgb(35, 218, 59);">
                <tr>
                    <th>Id</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Subtotal</th>
                    <th class="text-center">Edit</th>
                </tr>
            </thead>
            <tbody>
                <form action="/order" method="POST">
                    @csrf
                    @php
                        $grandtotal = 0;
                        $total_biaya = 0;
                    @endphp
                    @foreach ($data as $detail)
                        <tr>
                            <td>
                                {{ $detail->id }}
                            </td>
                            <td>
                                {{ $detail->nama_produk }}
                            </td>
                            <td>
                                Rp.{{ $detail->harga }}
                            </td>
                            <td class="text-center">
                                <div class="input-group mb-3" style="width: 130px">
                                    <button class="input-group-text" type="submit" name="action" value="kurang"
                                        href="/kurang/{{ $detail->id }}">-</button>
                                    <input type="text" class="form-control bg-white" disabled
                                        value="{{ $detail->jumlah }}">
                                    <button class="input-group-text" type="submit" name="action"
                                        value="tambah"href="/tambah/{{ $detail->id }}">+</button>
                                </div>
                            </td>
                            <td style="width: 22%" class="text-center">
                                Rp.{{ $detail->total_harga }}
                            </td>
                            <td class="text-center">
                                @method('delete')
                                {{ csrf_field() }}
                                <a class="btn btn-outline-dark" onClick="return confirmDelete(event)"
                                    href="/delete/{{ $detail->id }}"><i class="mdi mdi-delete "></i></a>
                            </td>
                        </tr>
                        @php
                            $grandtotal += $detail->total_harga;
                        @endphp
                    @endforeach
                    <tr>
                        <th colspan="4" style="text-align: left;">Grand Total</th>
                        <td style="text-align: center;">
                            Rp. {{ $grandtotal }}
                        </td>
                        <td>&nbsp;</td>
                    </tr>
            </tbody>
        </table>
        <br>
        <div class="col-md-12 text-end">
            <button class="btn btn-outline-success">Beli</button>

        </div>
    </div>
    </form>
@endsection
