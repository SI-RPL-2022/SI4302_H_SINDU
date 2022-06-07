@extends('layouts.sidebar')

@section('title', 'Data Kelas')

@section('title-page', 'Data Kelas')

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
                <a href="{{ route('admin.show.mata.pelajaran') }}" class="btn btn-sm btn-danger"><i class="fas fa-angle-left"></i></a>           
                <button type="button" class="btn btn-sm btn-tambah" data-bs-toggle="modal" data-bs-target="#tambahDataKelas">
                Tambah Data Kelas
                </button>
                <div class="modal fade" id="tambahDataKelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kelas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.tambah.kelas') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Nama Kelas</label>
                                        <input type="text" class="form-control form-control-sm @error('nama_kelas') is-invalid @enderror" name="nama_kelas" value="{{ old('nama_kelas') }}">
                                        @error('nama_kelas')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror                                        
                                    </div>                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-sm btn-tambah">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="card-tools mt-1">
                    <form action="{{ route('admin.cari.kelas') }}"  method="get">
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
                            <th>Nama Kelas</th>                                                                               
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($data as $datas)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $datas->nama_kelas }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-square btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#editKelas_{{ $datas->id_kelas }}">
                                <i class="fas fa-pencil-alt"></i>
                                </button>
                                <div class="modal fade" id="editKelas_{{ $datas->id_kelas }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Kelas</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/data-kelas/update/'.$datas->id_kelas) }}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="">Nama Kelas</label>
                                                        <input type="text" class="form-control form-control-sm @error('nama_kelas') is-invalid @enderror" name="nama_kelas" value="{{ $datas->nama_kelas }}">
                                                        @error('nama_kelas')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror                                        
                                                    </div>                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-sm btn-warning">Ubah</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                    
                                <a href="{{ url('/admin/data-kelas/delete/'.$datas->id_kelas) }}" class="btn btn-sm btn-square btn-danger mb-1"><i class="fas fa-trash"></i></a>
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