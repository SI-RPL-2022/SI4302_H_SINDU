@extends('layouts.sidebar')

@section('title', 'Testimoni')

@section('title-page', 'Testimoni')

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
                <button type="button" class="btn btn-sm btn-tambah" data-toggle="modal" data-target="#tambahTestimoni">
                    Tambah Testimoni
                </button>
                <div class="modal fade" id="tambahTestimoni">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Testimoni</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.store.testimoni') }}" method="post">
                                @csrf
                                    <div class="form-group mb-1">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>                                                                                                                           
                                    <div class="form-group mb-2">
                                        <label for="">Deskripsi Testimoni</label>
                                        <textarea name="deskripsi_testimoni" class="form-control form-control-sm @error('deskripsi_testimoni') is-invalid @enderror" style="resize:none;">{{ old('deskripsi_testimoni') }}</textarea>
                                        @error('deskripsi_testimoni')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>                         
                                    <input type="text" name="id_users" value="{{Auth::user()->id}}" hidden>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
                                <button class="btn btn-sm btn-tambah" type="submit">Simpan</button> 
                                </form>
                            </div>
                        </div>                
                    </div>                
                </div>                
                <div class="card-tools mt-1">
                    <form action="{{ route('admin.cari.testimoni') }}"  method="get">
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
                            <th>Nama</th>                            
                            <th>Tanggal</th>                            
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($data as $datas)
                        <tr>                        
                            <td>{{ $no++ }}</td>
                            <td>{{ $datas->nama }}</td>                                    
                            <td>{{ $datas->created_at }}</td> 
                            <td>
                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#showDetailTestimoni_{{ $datas->id_testimoni }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <div class="modal fade" id="showDetailTestimoni_{{ $datas->id_testimoni }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Testimoni</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div style="font-size:15px;" class="mb-1">Dibuat Oleh : {{ $datas->nama }}</div>
                                                <p style="font-size:13px;">{{ $datas->deskripsi_testimoni }}</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>                                                
                                            </div>
                                        </div>                
                                    </div>                
                                </div> 
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editTestimoni_{{ $datas->id_testimoni }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <div class="modal fade" id="editTestimoni_{{ $datas->id_testimoni }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Testimoni</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/testimoni/update/'.$datas->id_testimoni) }}" method="post">
                                                @csrf
                                                    <div class="form-group mb-1">
                                                        <label for="">Nama</label>
                                                        <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" name="nama" value="{{ $datas->nama }}">
                                                        @error('nama')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>                                                                                                                           
                                                    <div class="form-group mb-2">
                                                        <label for="">Deskripsi Testimoni</label>
                                                        <textarea name="deskripsi_testimoni" class="form-control form-control-sm @error('deskripsi_testimoni') is-invalid @enderror" style="resize:none;">{{ $datas->deskripsi_testimoni }}</textarea>
                                                        @error('deskripsi_testimoni')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>                         
                                                    <input type="text" name="id_users" value="{{Auth::user()->id}}" hidden>    
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>                                                
                                                <button class="btn btn-sm btn-tambah" type="submit">Simpan</button> 
                                                </form>
                                            </div>
                                        </div>                
                                    </div>                
                                </div> 
                                <a href="{{ url('/admin/testimoni/delete/'.$datas->id_testimoni) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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