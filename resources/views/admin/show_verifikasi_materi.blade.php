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
                    <form action="#"  method="get">
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
                            <th>Judul</th>
                            <th>Mata Pelajaran</th>
                            <th>Tanggal</th>
                            <th>Nama Penulis</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                        @foreach($data as $datas)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $datas->judul_materi }}</td>
                            <td>{{ $datas->nama_mata_pelajaran }}</td>
                            <td>{{ $datas->created_at }}</td>
                            <td>{{ $datas->name }}</td>
                            <td>
                                @if($datas->status == "Rilis")
                                    <span class="badge bg-success">{{ $datas->status }}</span>                                    
                                @elseif($datas->status == "Menunggu")              
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
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>                                                
                                            </div>
                                        </div>                                        
                                    </div>                                
                                </div>                                                                                                        
                                <a href="#" class="btn btn-sm btn-square btn-danger mb-1"><i class="fas fa-trash"></i></a>
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