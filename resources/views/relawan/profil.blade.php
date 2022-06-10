@extends('layouts.sidebar')

@section('title', 'Profil')

@section('title-page', 'Ubah Profil')

@section('content')

<div class="card p-4">
    <form action="">
    <div class="row g-3">
        <div class="col">
            <img src="{{ asset('image/profil/'. Auth::user()->foto_profile) }}" alt="" style="width:300px; height:300px; float:center; border-radius:50%; margin-left: 60px;">
            <input type="file" name="foto_profile" style="margin-left:100px; margin-top:50px; margin-bottom:62px;">
            <h5 class="fw-bold mb-3">Ubah Password</h5>
            <div class="mb-3">
                <label for="no_hp" class="form-label fw-normal">Password Lama</label>
                <input type="password" class="form-control" id="no_hp" name="no_hp" placeholder="">
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label fw-normal">Password Baru</label>
                <input type="password" class="form-control" id="no_hp" name="no_hp">
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label fw-normal">Konfirmasi Password Baru</label>
                <input type="password" class="form-control" id="no_hp" name="no_hp">
            </div>
        </div>
        <div class="col">
            <h5 class="fw-bold mb-3">Informasi Akun</h5>
            <div class="mb-3">
                <label for="name" class="form-label fw-normal">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="">
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label fw-normal">NIK</label>
                <input type="number" class="form-control" id="nik" name="nik" placeholder="">
            </div>
            <div class="mb-3">
                <label for="tgl_lahir" class="form-label fw-normal">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="">
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label fw-normal">Jenis Kelamin</label>
                <div class="row ms-1">
                    <div class="col form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin">
                        <label class="form-check-label" for="jenis_kelamin">
                            Pria
                        </label>
                    </div>
                    <div class="col form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" checked>
                        <label class="form-check-label" for="jenis_kelamin">
                            Wanita
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label fw-normal">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-normal">Alamat Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label fw-normal">Nomor HP</label>
                <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="">
            </div>
            <div class="mb-3">
                <label for="riwayat_pendidikan" class="form-label fw-normal">Riwayat Pendidikan</label>
                <input type="text" class="form-control" id="riwayat_pendidikan" name="riwayat_pendidikan" placeholder="">
            </div>
        </div>
    </div>
    </form>
    <button type="button" class="btn btn-tambah mx-auto">Simpan</button>
</div>


@endsection