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
                            <li class="breadcrumb-item active">Edit Barang</li>
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

                                        <form action="{{ route('barangs.update', $barang->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Nama Barang:</strong>
                                                        <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}"
                                                            class="form-control" placeholder="Nama Barang">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Nama Merek:</strong>
                                                        <select name="nama_merek" class="form-control @error('Barang') is-invalid @enderror" >
                                                            <option value="{{ $barang->nama_merek }}">{{ $barang->nama_merek }}</option>
                                                            @foreach ($distributors as $data)
                                                                <option value="{{ $data->n_rek }}">{{ $data->n_rek }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Nama Distributor:</strong>
                                                        <select name="nama_distributors" class="form-control @error('Barang') is-invalid @enderror">
                                                            <option value="{{ $barang->nama_distributors }}">{{ $barang->nama_distributors }}</option>
                                                            @foreach ($distributors as $item)
                                                                <option value="{{ $item->n_dist }}">{{ $item->n_dist }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Harga Barang:</strong>
                                                        <input type="text" name="harga_barang" value="{{ $barang->harga_barang }}" class="form-control" placeholder="Harga Barang">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Harga Beli:</strong>
                                                        <input type="text" name="harga_beli" value="{{ $barang->harga_beli }}" class="form-control" placeholder="Harga Beli">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Stok:</strong>
                                                        <input type="text" name="stok" value="{{ $barang->stok }}" class="form-control" placeholder="Stok">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                @endsection
