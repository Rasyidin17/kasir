@extends('layout.main')
@section('content')
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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Transaksi</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tampilan Admin</h3>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <div class="col-md-12">
                                    <!-- general form elements -->
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Silahkan Edit Di Bawah Ini</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
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

                                        <form action="{{ route('transaksis.update', $transaksi->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Nama Barang:</strong>
                                                        <input type="text" name="n_rang" value="{{ $transaksi->n_rang }}"
                                                            class="form-control" placeholder="Nama Barang">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Harga Barang:</strong>
                                                        <input type="text" name="h_rang" value="{{ $transaksi->h_rang }}"
                                                            class="form-control" placeholder="Harga Barang">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Total Barang:</strong>
                                                        <input type="text" name="t_rang" value="{{ $transaksi->t_rang }}"
                                                            class="form-control" placeholder="Total Barang">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Total Harga:</strong>
                                                        <input type="text" name="t_har" value="{{ $transaksi->t_har }}" class="form-control" placeholder="Total Harga">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Total Bayar:</strong>
                                                        <input type="text" name="t_yar" value="{{ $transaksi->t_yar }}" class="form-control" placeholder="Total Bayar">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Kembalian:</strong>
                                                        <input type="text" name="kembalian" value="{{ $transaksi->kembalian }}" class="form-control" placeholder="Kembalian">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Tanggal Beli:</strong>
                                                        <input type="date" name="tng_beli" value="{{ $transaksi->tng_beli }}" class="form-control" placeholder="Tanggal Beli">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                @endsection
