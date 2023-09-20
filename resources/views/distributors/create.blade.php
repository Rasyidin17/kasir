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
                            <li class="breadcrumb-item"><a href="{{ route('distributors.index') }}">Back</a></li>
                            <li class="breadcrumb-item active">Tambah Distributor</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
                    <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <div class="col-md-12">
                                    <!-- general form elements -->
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Silahkan Tambahkan Di Bawah Ini</h3>
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
                                       
                                    <form action="{{ route('distributors.store') }}" method="POST">
                                        @csrf
                                        
                                         <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Nama Distributor:</strong>
                                                    <input type="text" name="n_dist" class="form-control" placeholder="Nama Distributor">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Nama Merek:</strong>
                                                    <input type="text" name="n_rek" class="form-control" placeholder="Nama Merek">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Alamat:</strong>
                                                    <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Nomor Telephone:</strong>
                                                    <input type="text" name="no_tlp" class="form-control" placeholder="Nomor Telephone" pattern="\d*" maxlength="13">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                       
                                    </form>
                                    </div>
                                    <!-- /.card -->
                                </div>
                                </table>
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
    {{-- {!! $siswas->links() !!} --}}
@endsection
