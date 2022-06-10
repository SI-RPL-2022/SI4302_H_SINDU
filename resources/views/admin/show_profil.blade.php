@extends('layouts.sidebar')

@section('title', 'Profil')

@section('title-page', 'Ubah Profil')

@section('content')

<div class="card p-4">
    <form action="">
    <div class="row g-3">
        <div class="col-md-4">
            <img src="{{ asset('image/profil/'. Auth::user()->foto_profile) }}" alt="" style="width:200px; height:200px; float:center; border-radius:50%; margin-left: 40px;">
            <input type="file" name="foto_profile" style="margin-left:40px; margin-top:20px; margin-bottom:62px;">
        </div>
        <div class="col-md-8">
            <h5 class="fw-bold mb-3">Informasi Akun</h5>
            <div class="mb-3">
                <label for="name" class="form-label fw-normal">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-normal">Alamat Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label fw-normal">Nomor HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="name@example.com">
            </div>
            <h5 class="fw-bold mb-3">Ubah Password</h5>
            <div class="mb-3">
                <label for="no_hp" class="form-label fw-normal">Password Lama</label>
                <input type="password" class="form-control" id="no_hp" name="no_hp">
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
    </div>
    </form>
    <button type="button" class="btn btn-tambah mx-auto">Simpan</button>
</div>

@endsection