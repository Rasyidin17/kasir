<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    {{-- <h1>{{ $title }}</h1> --}}
    {{-- <p>{{ $date }}</p> --}}
    <p>Data Barang </p>
  
    <table id="example" class="table table-hover table-bordered data-table text-nowrap">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Nama Merek</th>
            <th>Nama Distributor</th>
            <th>Harga Barang</th>
            <th>Harga Beli</th>
            <th>Stok</th>
            <th>Tanggal Masuk</th>
        </tr>
        @foreach ($barangs as $barang)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $barang->kode_barang }}</td>
            <td>{{ $barang->nama_barang }}</td>
            <td>{{ $barang->nama_merek }}</td>
            <td>{{ $barang->nama_distributors }}</td>
            <td>{{ $barang->harga_barang }}</td>
            <td>{{ $barang->harga_beli }}</td>
            <td>{{ $barang->stok }}</td>
            <td>{{ $barang->tanggal }}</td>
        @endforeach
        </tr>
    </table>
  
</body>
</html>