@extends('layouts.sidebar')

@section('title', 'Verifikasi Pengajuan Relawan')

@section('title-page', 'Verifikasi Pengajuan Relawan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-3">
            <a href="{{ route('admin.show.verifikasi.pengajuan') }}"
                class="btn btn-sm btn-danger mx-1">Kembali</a>
            <button type="button" data-toggle="modal" data-target="#lihatDeskripsi"
                class="btn btn-sm btn-primary mx-1">Lihat Deskripsi</button>
            <a href="{{ url('admin/pengajuan_relawan/download/'. $pengajuan->berkas .'') }}"
                class="btn btn-sm btn-dark mx-1">Lihat Berkas</a>
            <div class="modal fade" id="lihatDeskripsi">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Verifikasi Pengajuan {{ $pengajuan->nama_organisasi }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <div class="row mb-1">
                                    <div class="col">
                                        <div class="form-group mb-0">
                                            <label for="" class="form-label">Jumlah Dibutuhkan</label>
                                            <input type="text" class="form-control form-control-sm"
                                                value="{{ $pengajuan->jumlah_relawan }} orang" readonly>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-0">
                                            <label for="" class="form-label">Pengaju</label>
                                            <input type="text" class="form-control form-control-sm"
                                                value="{{ $pengajuan->nama_lengkap }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">
                                        <div class="form-group mb-0">
                                            <label for="foto" class="form-label">No. HP Pengaju</label>
                                            <input class="form-control form-control-sm" type="text"
                                                value="{{ $pengajuan->no_hp }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-0">
                                            <label for="foto" class="form-label">Email Pengaju</label>
                                            <input class="form-control form-control-sm" type="text"
                                                value="{{ $pengajuan->email }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">
                                        <div class="form-group mb-0">
                                            <label for="foto" class="form-label">Tanggal Mulai</label>
                                            <input class="form-control form-control-sm" type="text"
                                                value="{{ $pengajuan->startDate }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-0">
                                            <label for="foto" class="form-label">Tanggal Selesai</label>
                                            <input class="form-control form-control-sm" type="text"
                                                value="{{ $pengajuan->endDate }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">
                                        <div class="form-group mb-0">
                                            <label for="foto" class="form-label">Deskripsi Singkat</label>
                                            <input class="form-control form-control-sm" type="text"
                                                value="{{ $pengajuan->deskripsi }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-0">
                                            <label for="foto" class="form-label">Deskripsi Lengkap</label>
                                            <input class="form-control form-control-sm" type="text"
                                                value="{{ $pengajuan->deskripsi_lengkap }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">
                                        <div class="form-group mb-0">
                                            <label for="foto" class="form-label">Syarat Umum 1</label>
                                            <input class="form-control form-control-sm" type="text"
                                                value="{{ $pengajuan->syarat_umum_pertama }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-0">
                                            <label for="foto" class="form-label">Syarat Umum 2</label>
                                            <input class="form-control form-control-sm" type="text"
                                                value="{{ $pengajuan->syarat_umum_kedua }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="form-label">Foto Lokasi</label>
                                        <img class="img-fluid border rounded w-100"
                                            src="{{ asset('image/foto_lokasi/'. $pengajuan->foto_lokasi .'') }}"
                                            alt="">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="card-tools mt-1">
                    <form action="{{ route('admin.cari.verifikasi.pengajuan') }}" method="get">
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
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>NIK</th>
                            <th>Berkas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($data as $datas)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $datas->nama_relawan }}</td>
                                <td>{{ $datas->email_relawan }}</td>
                                <td>{{ $datas->nik }}</td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target="{{ '#lihatKTP'. $datas->id_detail_pengajuan_relawan .'' }}"
                                        class="btn btn-sm btn-primary">Lihat KTP</button>
                                    <div class="modal fade" id="{{ 'lihatKTP'. $datas->id_detail_pengajuan_relawan.''}}">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">KTP {{ $datas->nama_relawan }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" enctype="multipart/form-data" method="post">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="" class="form-label">Foto KTP</label>
                                                                <img class="img-fluid border rounded w-100"
                                                                    src="{{ asset('berkas/jadi_relawan/'. $datas->berkas_ktp .'') }}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-sm btn-default"
                                                        data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ url('admin/jadi_relawan/download/'. $datas->berkas_cv .'') }}"
                                        class="btn btn-sm btn-dark mx-1">Lihat CV</a>
                                </td>
                                <td class="d-flex">
                                    @if($datas->status == "Diterima")
                                        <span class="badge bg-success my-2">{{ $datas->status }}</span>                                    
                                    @elseif($datas->status == "Diproses")  
                                    <a class="btn btn-sm btn-success mb-1 mx-1" href="{{ url('/admin/'. $pengajuan->id_pengajuan_relawan.'/jadi-relawan/Diterima/'. $datas->id_detail_pengajuan_relawan .'') }}">Terima</a>
                                    <a class="btn btn-sm btn-warning mb-1 mx-1" href="{{ url('/admin/'. $pengajuan->id_pengajuan_relawan.'/jadi-relawan/Ditolak/'. $datas->id_detail_pengajuan_relawan .'') }}">Tolak</a>                                    
                                    @elseif($datas->status == "Ditolak")
                                        <span class="badge bg-danger my-2">{{ $datas->status }}</span>
                                    @endif
                                    <a class="btn btn-sm btn-danger mb-1 mx-2" href="{{ url('/admin/'. $pengajuan->id_pengajuan_relawan .'/jadi-relawan/delete/'. $datas->id_detail_pengajuan_relawan .'') }}">Hapus</a>                                    
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
