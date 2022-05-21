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
                <div class="row">
                    <div class="col">
                        <form action="{{ route('admin.cari.donasi') }}"  method="get">
                            <div class="input-group input-group-sm" style="width: 500px;">
                                <input type="text" name="cari" class="form-control float-right" placeholder="Cari">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col ">
                        <?php
                            $total = 0;
                            foreach($data as $key => $datas){
                                if ($datas->status == "confirmed"){
                                    $total += $datas->total_donasi;
                                }
                            }
                            
                        ?>
                        <div style="margin-left:200px;">
                            <h4>Total Donasi: {{$total}}</h4>
                        </div>
                        
                    </div>
                </div>                 
            </div>
            <div class="card-body table-responsive" >
                <table class="table table-hover table-head-fixed ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>                            
                            <th>Email</th>                            
                            <th>Total Donasi</th>
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
                            <td>
                                <a href="{{asset ('image/donasi/' . $datas->bukti_transfer)}}" target="_black" rel="noopener noreferer">Lihat Gambar</a>
                            </td>
                            <td>
                            @if($datas->status =='pending')
                                <a href="{{url ('admin/donasi/status/'. $datas->id_donasi)}}" class="btn btn-warning btn-sm text-white">Terima</a>         
                            @else
                                <button type="button" class="btn btn-secondary btn-sm" disabled>Diterima</button>   
                            @endif
                                
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