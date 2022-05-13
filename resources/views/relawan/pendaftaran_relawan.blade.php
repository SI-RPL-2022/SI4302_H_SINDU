@extends('layouts.sidebar')

@section('content')

<div class="row row-cols-1 row-cols-md-2 g-4">
    {{-- @foreach($data as $key => $datas) --}}
    <div class="col">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="" class="img-fluid rounded-start" alt="">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">SMAN 1 Tadika Mesra</h5>
                        <p class="card-text"><small class="text-muted">26 Maret 2022 - 25 April 2022</small></p>
                        <p class="card-text">Dibutuhkan relawan pendidikan untuk mengajar Teori Relativitas untuk siswa kelas 12 sebagai pengganti Cikgu Besar</p>
                        <button type="button" class="btn btn-primary">Ikuti</button>
                        <button type="button" class="btn btn-dark">Lihat Detail</button>
                        <p class="card-text">20 Orang </p>
                        <p class="card-text"> Berusia 18-24 Tahun</p>
                        <p class="card-text"> Memahami Teori Relativitas</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @endforeach --}}
</div>

@endsection