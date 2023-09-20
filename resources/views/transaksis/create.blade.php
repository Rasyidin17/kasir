@extends('layout.main')
@section('content')
@inject('carbon', 'Carbon\Carbon')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Admin</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('transaksis.index') }}">Back</a></li>
                            <li class="breadcrumb-item active">Tambah Transaksi</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                            <div class="card-body table-responsive p-0">
                                <div class="col-md-12">
                                    <!-- general form elements -->
                                    <div class="card">
                                        <div class="card-header"> 
                                            <button type="button" name="add" id="add" class="btn btn-primary">Tambah Transaksi</button>
                                        </div>
                                        {{-- <div class="card-header">
                                            <tr>
                                                <td>
                                                    <input type="text" name="transaksi" id="transaksi" class="transaksi">
                                                </td>
                                            </tr>
                                        </div> --}}
                                <form action="{{ route('transaksis.store') }}" method="POST">
                                            @csrf
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-bordered text-nowrap" id="table">
                                                <tr>
                                                    <th>Kode Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Harga</th>
                                                    <th>Total</th>
                                                    <th>Total Harga</th>
                                                    <th>Total Bayar</th>
                                                    <th>Kembalian</th>
                                                    <th>Tanggal Beli</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </table>
                                            <button type="submit" class="btn btn-success col-md-2 container-fluid">Simpan</button>
                                        </div>
                                    </div>      
                                </form>
                            </div>
                            <!-- /.card-body -->
                        <!-- /.card -->
            </div>
            <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var i = 0;
        $('#add').click(function() {
            i++;
            $('#table').append(
                `<tr>
                    <td>
                        <select name="inputs[` + i + `][kode]" class="form-control barang @error('transaksi') is-invalid @enderror">
                            <option value="">Pilih Barang</option>
                             @foreach ($barangs as $data)
                                <option data-id="{{ $data->harga_beli }}" data-filter="{{ $data->nama_barang }}" data-total=1 data-har="{{ $data->harga_beli }}" value="{{ $data->kode_barang }}">{{ $data->kode_barang }} : {{ $data->stok }}</option>
                            @endforeach
                        </select>
                    </td>
                <td>
                    <input type="text" name="inputs[` + i + `][nama]" placeholder="Nama Barang" class="form-control nama_barang` + i +`"/>
                </td>
                <td>
                    <input type="text" name="inputs[` + i + `][harga]"  placeholder="Harga" class="form-control harga_barang` + i +`" readonly/>
                </td>
                <td>
                    <input  type="text" name="inputs[` + i + `][total]" placeholder="total" class="form-control total_barang` + i +`" data-index="[` + i +`]" />
                </td>
                <td>
                    <input type="number" name="inputs[` + i + `][t_har]" placeholder="Total Harga" class="form-control total_harga` + i +`" data-harga="[` + i +`]" readonly/>
                </td>
                <td>
                    <input type="number" name="inputs[` + i + `][t_yar]" placeholder="Total Bayar" class="form-control total_bayar" data-bayar="[` + i +`]" pattern="\d*"/>
                </td>
                <td>
                    <input type="number" name="inputs[` + i + `][kembalian]" placeholder="kembalian" class="form-control kembalian" readonly pattern="\d*"/>
                </td>
                <td>
                    <input type="text" name="inputs[` + i + `][tng_beli]" placeholder="tng_beli" class="form-control" value="{{ $carbon::now()->format('d/m/Y') }}" readonly/>
                </td>
                <td>
                  <button type="button" class="btn btn-danger remove-table-row">Hapus</button>
                </td>

           </tr>`);
           $('select[name="inputs[' + i + '][kode]"]').change(function() {
                console.log(this);
                let barangs = $(this).find('option:selected').attr('data-id');
                let harga = $(".harga_barang" + i).val(barangs);
                let barang = $(this).find('option:selected').attr('data-filter');
                let nama = $('.nama_barang' + i).val(barang);
                let total = $(this).find('option:selected').attr('data-total');
                let t_rang = $(".total_barang" + i).val(total);
                let beli = $(this).find('option:selected').attr('data-har');
                let belis = $(".total_harga" + i).val(beli);
                console.log(nama, harga, total, belis);
            });
            $(".total_barang" + i).keyup(function () {
                var i = $(this).data('index'); // Mengambil indeks dari elemen '.total_barang' yang memicu keyup
                var hargas = $('input[name="inputs[' + i + '][harga]"]').val();
                var jumlah = $(this).val(); // Mengambil nilai dari elemen '.total_barang' yang memicu keyup
                var total = parseInt(jumlah) * parseInt(hargas);
                $('input[name="inputs[' + i + '][t_har]"]').val(total);
                console.log(total);
            });
            $('.total_bayar').keyup(function () {
                var i = $(this).data('bayar'); // Mendapatkan nilai indeks (i) dari atribut data-bayar pada elemen '.total_bayar'
                var bayar = $('input[name="inputs[' + i + '][t_har]"]').val(); // Mengambil nilai bayar dari input yang sesuai
                var totals = $(this).val(); // Mengambil nilai total bayar dari elemen '.total_bayar' yang memicu keyup
                var kembalian = parseInt(totals) - parseInt(bayar); // Menghitung kembalian dengan mengurangkan total dan bayar
                $('input[name="inputs[' + i + '][kembalian]"]').val(kembalian); // Menetapkan nilai kembalian ke input yang sesuai
                console.log(kembalian); // Log hasil perhitungan kembalian ke konsol
            });
            });
            $(document).on('click', '.remove-table-row', function() {
                $(this).parents('tr').remove();
            });
    </script>
    <script>
        $(document).on('keyup', '.transaksi', function () {
            var i = $(this).data('harga'); // Mendapatkan indeks (i) dari atribut data-index
            var jumlah = $('input[name="inputs[' + i + '][t_har]"]').val(); // Mengambil nilai dari elemen '.total_barang' yang memicu keyup
            var harga = $('input[name="inputs[' + i + '][t_har]"]').val(); // Mendapatkan harga dari elemen select yang sesuai

            // Menghitung total harga
            var total_harga = parseInt(jumlah) + parseInt(harga);

            // Memasukkan nilai total harga ke dalam input yang sesuai
            $('input[name="transaksi"]').val(total_harga);

            // Di sini Anda dapat menambahkan kode untuk menghitung total bayar dan kembalian jika diperlukan
        });
    </script>
@endsection
