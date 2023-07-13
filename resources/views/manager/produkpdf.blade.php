
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
            <h3> Laporan Data Produk Kedai Kopi </h3>
            <h3> Data Produk Kedai Kopi</h3><br>
    
            <table class="table table-borded" >
                <thead>
                     <tr>
                        <th style="padding: 10px;">No</th>
                        <th style="padding: 10px;">Produk</th>
                        <th style="padding: 10px;">Deskripsi</th>
                        <th style="padding: 10px;">Harga</th>
                        <th style="padding: 10px;">Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1 @endphp
                    @foreach ($produk as $p)
                    
                    <tr>
                        <td style="padding: 10px;">{{ $i++ }}</td>
                        <td style="padding: 10px;">{{ $p->nama_produk }}</td>
                        <td style="padding: 10px;">{{ $p->deskripsi }}</td>
                        <td style="padding: 10px;">{{ $p->harga }}</td>
                        <td style="padding: 10px;">{{ $p->stok }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
