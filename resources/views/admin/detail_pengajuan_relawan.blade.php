@extends('layouts.sidebar')

@section('title', 'Verifikasi Pengajuan Relawan')

@section('title-page', 'Verifikasi Pengajuan Relawan')

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
        <a href="{{ route('admin.show.verifikasi.pengajuan') }}" class="btn btn-sm btn-danger">
            Kembali
        </a>
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
                            <td class="d-flex">
                                @if($datas->status == "Diterima")
                                    <span class="badge bg-success my-2">{{ $datas->status }}</span>                                    
                                @elseif($datas->status == "Diproses")              
                                    <form action="{{ url('/admin/pengajuan-relawan/terima-pengajuan/'.$datas->id_pengajuan_relawan) }}" method="post">
                                        @csrf
                                        <input type="text" name="status" value="Diterima" hidden>
                                        <button type="submit" class="btn btn-sm btn-warning mb-1 mx-1">Terima</a> 
                                    </form>                      
                                    <form action="{{ url('/admin/pengajuan-relawan/tolak-pengajuan/'.$datas->id_pengajuan_relawan) }}" method="post">
                                        @csrf
                                        <input type="text" name="status" value="Ditolak" hidden>
                                        <button type="submit" class="btn btn-sm btn-danger mb-1 mx-1">Tolak</a> 
                                    </form>                                     
                                @elseif($datas->status == "Ditolak")
                                    <span class="badge bg-danger my-2">{{ $datas->status }}</span>
                                @endif
                            </td>
                            <td class="text-nowrap">          
                                <a href="{{ url('/admin/pengajuan-relawan/detail/'. $datas->id .'') }}" class="btn btn-sm btn-secondary mb-1" data-toggle="modal" data-target="">
                                    <i class="fas fa-eye"></i>
                                </a>                                                                                            
                                <a href="{{ url('/admin/pengajuan-relawan/delete/'.$datas->id_pengajuan_relawan) }}" class="btn btn-sm btn-square btn-danger mb-1"><i class="fas fa-trash"></i></a>
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