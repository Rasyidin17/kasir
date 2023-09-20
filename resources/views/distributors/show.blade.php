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
              <li class="breadcrumb-item active">Data Distributor</li>
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
                      <a class="btn btn-primary form-control float-right" href="{{ route('distributors.index') }}"> Back</a>
                    </div>
                </div>
                </div>
                <!-- /.card-header -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Distributor:</strong>
                    {{ $distributor->n_dist }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Merek:</strong>
                    {{ $distributor->n_rek }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat:</strong>
                    {{ $distributor->alamat }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nomor Telephone:</strong>
                    {{ $distributor->no_tlp }}
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