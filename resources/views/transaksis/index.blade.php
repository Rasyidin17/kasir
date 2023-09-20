@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ auth()->user()->name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="{{ route('export-pdf') }}">Download Pdf</a></li> --}}
              <li class="breadcrumb-item active"><a href="{{ route('transaksis.create') }}">Tambah Transaksi</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <form action="{{ route('transaksis.index') }}" method="GET">
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Transaksi</h3>
  
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="search" name="search" class="form-control float-right" placeholder="Search" id="myTable">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="card-body table-responsive p-0">
                <table id="example" class="table table-hover table-bordered data-table text-nowrap">
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Total Harga</th>
                        <th>Total Bayar</th>
                        <th>Kembalian</th>
                        <th>Tanggal Beli</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($transaksis as $transaksi)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $transaksi->kode }}</td>
                        <td>{{ $transaksi->nama }}</td>
                        <td>{{ $transaksi->harga }}</td>
                        <td>{{ $transaksi->total }}</td>
                        <td>{{ $transaksi->t_har }}</td>
                        <td>{{ $transaksi->t_yar }}</td>
                        <td>{{ $transaksi->kembalian }}</td>
                        <td>{{ $transaksi->tng_beli }}</td>
                        <td>
                            <form action="{{ route('transaksis.destroy',$transaksi->id) }}" method="POST">
               
                                <a class="btn btn-info" href="{{ route('transaksis.show',$transaksi->id) }}">
                                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                                </a>
                                @csrf
                                @method('DELETE')    
                                <a href="{{ route('transaksis.destroy',$transaksi->id) }}" type="submit" class="btn btn-danger" data-confirm-delete="true">
                                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                </a >
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>       
         </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @include('sweetalert::alert')
  {!! $transaksis->withQueryString()->links('pagination::bootstrap-5') !!}
  @endsection