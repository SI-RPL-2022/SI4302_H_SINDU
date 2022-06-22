@extends('layouts.sidebar')

@section('title', 'Dashboard')

@section('title-page', 'Dashboard')

@section('content') 
<?php
$total_materi = 0;
$total_diterima = 0;
$total_ditolak = 0;
$total_pelamar = 0;
foreach($materi as $key => $datas){
    
    $total_materi += 1;
    if ($datas->status == "Terima"){
        $total_diterima += 1;
    }
    if ($datas->status == "Tolak"){
        $total_ditolak += 1;
    }
}

foreach($pengajuan_relawan as $key => $datas){
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
                                Materi Ditolak</div>
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
                            line-height: 24px;">Materi Diterima</div>
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
                            line-height: 24px;">Total Materi Diunggah</div>
                            <div class="mb-0 text-center" style="font-family: 'Mulish';
                            font-style: normal;
                            font-weight: 700;
                            font-size: 40px;
                            line-height: 50px;
                            text-align: center;
                            letter-spacing: 1px;">
                                <p>{{ $total_materi }}</p></div>
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
                            line-height: 24px;">Total Pengajuan Relawan</div>
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
    </div>
    <html>
        <head>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
      
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ['Bulan', 'Jumlah Relawan'],
                <?php echo $kebutuhan_relawan; ?>
              ]);
      
              var options = {
                title: 'Grafik Kebutuhan Relawan',
                curveType: 'function',
                legend: { position: 'bottom' },
                hAxis: {
                    title: 'Bulan'
                },
                vAxis: {
                    title: 'Kebtuhan Realawan'
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
