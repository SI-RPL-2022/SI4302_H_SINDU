@extends('layouts.sidebar')

@section('title', 'Verifikasi Materi')

@section('title-page', 'Verifikasi Materi')

@section('content')
<div class="row justify-content-center">        
    <div class="col-md-12">            
        @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>
            {{ session('success') }}
        </div>                                                                   
        @endif                                     
        <div class="card">
            <div class="card-header">                
                <div class="card-tools mt-1">
                    <form action="{{ route('admin.cari.verifikasi.pengajuan') }}"  method="get">
                        <div class="input-group input-group-sm" style="width: 160px;">
                            <input type="text" name="cari" class="form-control float-right" placeholder="Cari">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>                        
            <div class="card-body table-responsive p-0" style="height: 355px;">
                <table class="table table-hover table-head-fixed ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Organisasi</th>
                            <th>Pengaju</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                        @foreach($data as $datas)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $datas->nama_organisasi }}</td>
                            <td>{{ $datas->nama_lengkap }}</td>
                            <td>{{ $datas->startDate }} - {{ $datas->endDate }}</td>
                            <td>
                                @if($datas->status == "Diterima")
                                    <span class="badge bg-success">{{ $datas->status }}</span>                                    
                                @elseif($datas->status == "Diproses")              
                                    <form action="{{ url('/admin/verifikasi-materi/rilis-materi/'.$datas->id_materi) }}" method="post">
                                        @csrf
                                        <input type="text" name="status" value="Rilis" hidden>
                                        <button type="submit" class="btn btn-sm btn-warning mb-1">Terima</a> 
                                    </form>                      
                                    <form action="{{ url('/admin/verifikasi-materi/tolak-materi/'.$datas->id_materi) }}" method="post">
                                        @csrf
                                        <input type="text" name="status" value="Ditolak" hidden>
                                        <button type="submit" class="btn btn-sm btn-danger">Tolak</a> 
                                    </form>                                     
                                @elseif($datas->status == "Ditolak")
                                    <span class="badge bg-danger">{{ $datas->status }}</span>
                                @endif
                            </td>
                            <td class="text-nowrap">          
                                <button type="button" class="btn btn-sm btn-secondary mb-1" data-toggle="modal" data-target="#showDetailMateri_{{ $datas->slug }}">
                                    <i class="fas fa-eye"></i>
                                </button> 
                                <div class="modal fade" id="showDetailMateri_{{ $datas->slug }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Materi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">     
                                                <h3 class="text-center">{{ $datas->judul_materi }}</h3>
                                                <img src="{{ asset('image/cover/'.$datas->cover_materi) }}" class="img-fluid rounded" alt="">
                                                <div class="mt-2 deskripsi-materi" align="justify">                                                        
                                                    {!! $datas->deskripsi_materi !!}
                                                </div>
                                                <div class="mt-1">
                                                    <p>
                                                    Berikut Link Video Materi: <br>
                                                    <a href="{{ $datas->video_materi }}">{{ $datas->video_materi }}</a>
                                                    </p>
                                                </div>                                           
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>                                                
                                            </div>
                                        </div>                                        
                                    </div>                                
                                </div>                                                                                                        
                                <a href="{{ url('/admin/verifikasi-materi/delete/'.$datas->id_materi) }}" class="btn btn-sm btn-square btn-danger mb-1"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>                            
                        @endforeach                                
                    </tbody>
                </table>
            </div>                        
        </div>  
    </div>
</div>                                                             
@endsection                    