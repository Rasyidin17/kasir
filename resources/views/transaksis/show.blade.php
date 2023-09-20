@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Transaksi</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tampilan Admin</h3>  
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <a class="btn btn-primary form-control float-right" href="{{ route('transaksis.index') }}"> Back</a>
                    </div>
                </div>
                </div>
                <!-- /.card-header -->
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Kode Barang:</strong>
                      {{ $transaksi->kode}}
                  </div>
              </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Barang:</strong>
                    {{ $transaksi->nama}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga Barang:</strong>
                    {{ $transaksi->harga }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total Barang:</strong>
                    {{ $transaksi->total }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total Harga:</strong>
                    {{ $transaksi->t_har }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total Bayar:</strong>
                    {{ $transaksi->t_yar }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kembalian:</strong>
                    {{ $transaksi->kembalian }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Tanggal Beli:</strong>
                  {{ $transaksi->tng_beli }}
              </div>
          </div>
                </div>
              </div>
            </div>
          </div>       
         </div>
      </div>
    </section>
  </div>
@endsection