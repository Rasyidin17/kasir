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
                  <h3 class="card-title">Grafik Transaksi</h3>
  
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
                <div class="card-body table-responsive p-0">
                    <div id="grafik"></div>
                </div>
              </div>
            </div>
          </div>       
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  </div>
  
  <script src="https://code.highcharts.com/11.1.0/highcharts.js"></script>
  <script type="text/javascript">
    var pendapatan = <?php echo json_encode($total_hargas); ?>;
    var count = {{ Js::from($count_data) }};
    var month = {{ Js::from($month_data) }};
    Highcharts.chart('grafik', {
      title : {
        text: 'Grafik pendapatan Bulanan'
      },
      xAxis : {
        categories : month
      },
      yAxis : {
        title : {
          text : 'Nominal Pendapatan Bulanan'
        }
      },
      plotOptions : {
        series: {
          allowPointSelect : true
        }
      },
      series : [
        {
        name : 'Nominal Pendapatan',
        data : pendapatan 
        }
      ]
    });
  </script>
  @endsection