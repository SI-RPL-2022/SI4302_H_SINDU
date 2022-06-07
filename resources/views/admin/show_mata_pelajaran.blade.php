@extends('layouts.sidebar')

@section('title', 'Data Mata Pelajaran')

@section('title-page', 'Data Mata Pelajaran')

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
                <button type="button" class="btn btn-sm btn-tambah" data-bs-toggle="modal" data-bs-target="#tambahMataPelajaran">
                Tambah Mata Pelajaran
                </button>
                <div class="modal fade" id="tambahMataPelajaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mata Pelajaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="">
                                    <div class="form-group">
                                        <label for="">Nama Mata Pelajaran</label>
                                        <input type="text" name="nama_mata_pelajaran" class="form-control form-control-sm">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm-danger" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-sm-tambah">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('admin.show.kelas') }}" class="btn btn-sm btn-info">Data Kelas</a>           
                <div class="card-tools mt-1">
                    <form action="{{ route('admin.cari.verifikasi.materi') }}"  method="get">
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
                            <th>Nama Mata Pelajaran</th>
                            <th>Kelas</th>                                                        
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                                                    
                    </tbody>
                </table>
            </div>                        
        </div>  
    </div>
</div>                                                             
@endsection                    