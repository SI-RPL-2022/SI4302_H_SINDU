@extends('layouts.landing')
@section('title', 'Materi')

@section('extend-css')
<style>
    .fit-cover {
        object-fit: cover;
    }

    #form1{
        background-color:white;
    }

    @media (min-width: 768px) {
        .fit-cover {
            position: absolute;
        }
    }
</style>
@endsection 

@section('content')
<div class="title-materi-container"></div>
<div class="container mt-4">
    <div class="mb-2">
        <div class="fw-bold fs-4 mb-2" style="color:#297BBF;">Yuk Selesaikan!</div>
        <div class="row g-2">
            @foreach($dataReq as $dataReqs)
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card" style="min-height:150px;">
                    <div class="row g-0">
                        <div class="col-sm-5 position-relative">
                            <img src="{{ asset('image/cover/'.$dataReqs->cover_materi) }}" class="card-img fit-cover w-100" style="height:150px;" alt="...">
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a class="link-dark text-decoration-none" style="font-size:14px;" href="{{ url('/materi/'.$dataReqs->slug) }}">{{ $dataReqs->judul_materi }}</a>
                                </h5>
                                <p class="card-text text-muted" style="font-size:12px;">{{ $dataReqs->name }}</p>
                                <p class="card-text" style="font-size:10px;">Kelas {{ $dataReqs->nama_kelas }}, {{ $dataReqs->nama_mata_pelajaran }}</p>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div> 
            @endforeach                  
        </div>
    </div>  
    <div class="mt-5 mb-5">
        <div class="row g-2 mb-2">
            <div class="col-12 col-md-12 col-lg-6 text-start">
                <div class="fw-bold fs-4 mb-2" style="color:#297BBF;">Direkomendasikan Untukmu!</div>
            </div>    
            <div class="col-6 col-md-6 col-lg-3 text-end">
                <form action="{{ route('filter.materi') }}" method="get">
                    <div class="input-group">    
                        <select name="filter" style="background-color:white;" class="form-select form-select-sm" id="">
                            <option value="Kelas">Kelas</option>
                            <option value="Mata Pelajaran">Mata Pelajaran</option>
                        </select>                                                    
                        <input type="text" placeholder="Filter" id="form1" name="cari" class="form-control form-control-sm" />                                            
                        <button type="submit" class="btn btn-sm btn-dark">
                            <i class="fas fa-filter"></i>
                        </button>                    
                    </div>
                </form>                
            </div>                
            <div class="col-6 col-md-6 col-lg-3 text-end">                
                <form action="{{ route('cari.materi') }}" method="get">
                    <div class="input-group">                                                        
                        <input type="text" placeholder="Cari" id="form1" name="cari" class="form-control form-control-sm" />                                            
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fas fa-search"></i>
                        </button>                    
                    </div>
                </form>                    
            </div>            
        </div>        
        <div class="row g-2">
            @foreach($dataAll as $dataAlls)
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card" style="min-height:150px;">
                    <div class="row g-0">
                        <div class="col-sm-5 position-relative">
                            <img src="{{ asset('image/cover/'.$dataAlls->cover_materi) }}" class="card-img fit-cover w-100" style="height:150px;" alt="...">
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a class="link-dark text-decoration-none" style="font-size:14px;" href="{{ url('/materi/'.$dataAlls->slug) }}">{{ $dataAlls->judul_materi }}</a>
                                </h5>
                                <p class="card-text text-muted" style="font-size:12px;">{{ $dataAlls->name }}</p>
                                <p class="card-text" style="font-size:10px;">Kelas {{ $dataAlls->nama_kelas }}, {{ $dataAlls->nama_mata_pelajaran }}</p>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>    
            @endforeach                           
        </div>
    </div>          
</div>
@endsection
