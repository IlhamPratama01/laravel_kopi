
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    
</head>
  <body>

    <style type="text/css">
        table tr td,
        table tr th{
            font-size: 9pt;
            font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
        }
        
        h3 {
        text-align: center;
    }
        </style>
            <h3> Laporan Bulanan Penjualan Kedai Kopi </h3>
                <h3>Data Pembelian Kedai Kopi </h3><br>
    
            <table class="table table-borded" >
                <thead>
                     <tr>
                        <th>No</th>
                        <th style="padding-left: 10px;">Nama Pembeli</th>
                        <th style="padding-left: 10px;">Tanggal/Jam</th>
                        <th style="padding-left: 10px;">Nama Produk</th>
                        <th style="padding-left: 10px;">Jumlah</th>
                        <th style="padding-left: 10px;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1 @endphp
                    @foreach ($produk as $p)
                        @if($p->status === 'Selesai')
                            <tr>
                                <td style="padding: 10px;">{{ $i++ }}</td>
                                <td style="padding: 10px;">{{ $p->name }}</td>
                                <td style="padding: 10px;">{{ $p->waktu }}</td>
                                <td style="padding: 10px;">{{ $p->nama_produk }}</td>
                                <td style="padding: 20px;">{{ $p->jumlah }}</td>
                                <td style="padding: 10px;">{{ $p->grandtotal }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            
            