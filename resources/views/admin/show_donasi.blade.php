@extends('layouts.sidebar')

@section('title', 'Donasi')

@section('title-page', 'Donasi')

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
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <button type="button" class="btn btn-primary">Cari</button>
                </div>
            </div>
            <div class="card-body table-responsive" >
                <table class="table table-hover table-head-fixed ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>                            
                            <th>Email</th>                            
                            <th>No. Hp</th>
                            <th>Deskripsi</th>
                            <th>Bukti Transfer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $datas)
                        <tr>
                            <td>{{ $data-> firstItem()+ $key }}</td>
                            <td>{{ $datas->nama_donatur }}</td>
                            <td>{{ $datas->email_donatur }}</td>
                            <td>{{ $datas->total_donasi }}</td>
                            <td>{{ $datas->deskripsi_donasi }}</td>
                            <td>{{ $datas->bukti_transfer }}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm text-white">Terima</button>
                                <a type="button" class="btn btn-danger btn-sm" href="{{ url('/admin/donasi/delete/'.$datas->id_donasi) }}">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>            
                </table>
                <div class="float-left">
                    Menampilkan
                    {{ $data->firstItem() }}
                    sampai
                    {{ $data->lastItem() }}
                    dari
                    {{ $data->total() }}
                    data
                </div>
                <div class="float-right">
                    {{ $data->links() }}
                </div>    
            </div>
        </div>
    </div>
</div>        
@endsection