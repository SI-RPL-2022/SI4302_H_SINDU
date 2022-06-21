@extends('layouts.sidebar')

@section('title', 'Dashboard')

@section('title-page', 'Overview')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} SELAMAT DATANG {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div> --}}
    <?php
        $total_pengajuan = 0;
        $total_diterima = 0;
        $total_ditolak = 0;
        $total_pelamar = 0;
        foreach($pengajuan_relawan as $key => $datas){
            
            $total_pengajuan += 1;
            if ($datas->status == "Diterima"){
                $total_diterima += 1;
            }
            if ($datas->status == "Ditolak"){
                $total_ditolak += 1;
            }
        }
        
        foreach($pelamar as $key => $datas){
            $total_pelamar+=1;
        }
        
                    
    ?>
    
    
    
    
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card r-8px shadow h-134px w-306px py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="mb-1 text-center" style="font-family: 'Mulish';
                                font-style: normal;
                                font-weight: 700;
                                font-size: 19px;
                                line-height: 24px;">
                                    Total Pengajuan Ditolak</div>
                                    <div class="mb-0 text-center" style="font-family: 'Mulish';
                                    font-style: normal;
                                    font-weight: 700;
                                    font-size: 40px;
                                    line-height: 50px;
                                    text-align: center;
                                    letter-spacing: 1px;"><p>{{ $total_ditolak }}</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card r-8px shadow h-134px w-306px py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="mb-1 text-center" style="font-family: 'Mulish';
                                font-style: normal;
                                font-weight: 700;
                                font-size: 19px;
                                line-height: 24px;">Total Pengajuan Diterima</div>
                                <div class="mb-0 text-center" style="font-family: 'Mulish';
                                font-style: normal;
                                font-weight: 700;
                                font-size: 40px;
                                line-height: 50px;
                                text-align: center;
                                letter-spacing: 1px;"><p>{{ $total_diterima }}</p></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card r-8px shadow h-134px w-306px py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="mb-1 text-center" style="font-family: 'Mulish';
                                font-style: normal;
                                font-weight: 700;
                                font-size: 19px;
                                line-height: 24px;">Total Pelamar</div>
                                <div class="mb-0 text-center" style="font-family: 'Mulish';
                                font-style: normal;
                                font-weight: 700;
                                font-size: 40px;
                                line-height: 50px;
                                text-align: center;
                                letter-spacing: 1px;">
                                    <p>{{ $total_pelamar }}</p></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card r-8px shadow h-134px w-306px py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="mb-1 text-center" style="font-family: 'Mulish';
                                font-style: normal;
                                font-weight: 700;
                                font-size: 19px;
                                line-height: 24px;">Total Pengajuan</div>
                                <div class="mb-0 text-center" style="font-family: 'Mulish';
                                font-style: normal;
                                font-weight: 700;
                                font-size: 40px;
                                line-height: 50px;
                                text-align: center;
                                letter-spacing: 1px;">
                                <p>{{ $total_pengajuan }}</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <html>
        <head>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
      
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ['Bulan', 'Jumlah Donasi'],
                <?php echo $donasi; ?>
              ]);
      
              var options = {
                title: 'Grafik Donasi',
                curveType: 'function',
                legend: { position: 'bottom' },
                hAxis: {
                    title: 'Bulan'
                },
                vAxis: {
                    title: 'Jumlah Donasi (Rp)'
                },
              };
      
              var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
      
              chart.draw(data, options);
            }
          </script>
        </head>
        <body>
          <div id="curve_chart" style="width: 900px; height: 500px"></div>
        </body>
      </html>

</div>
@endsection
