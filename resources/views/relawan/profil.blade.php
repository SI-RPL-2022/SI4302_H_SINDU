@extends('layouts.sidebar')

@section('title', 'Profil')

@section('title-page', 'Ubah Profil')

@section('content')
<?php
session_start();
?>
<?php    
if(isset($_SESSION['status'])){
    ?>
    <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['status'];?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
    unset($_SESSION['status']);
} 
?>

<div class="card p-4">
    <form action="{{ route('relawan.update.profil')}}" enctype="multipart/form-data" method="post">
    @method("PUT")    
    @csrf
    <div class="row g-3">
        <div class="col">
            <img src="{{ asset('image/profil/'. $user->foto_profile) }}" alt="" style="object-fit:cover; width:300px; height:300px; float:center; border-radius:50%; margin-left: 60px;">
            <input type="file" name="foto_profile" style="margin-left:100px; margin-top:40px; margin-bottom:25px;">
            <div class="mb-3">
                <label for="email" class="form-label fw-normal">Alamat Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{(old('email'))?old('email'):$user->email}}">
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label fw-normal">Nomor HP</label>
                <input type="number" class="form-control" id="no_hp" name="no_hp" value="{{(old('no_hp'))?old('no_hp'):$user->no_hp}}">
            </div>
        </div>
        <div class="col">
            <h5 class="fw-bold mb-3">Informasi Akun</h5>
            <div class="mb-3">
                <label for="name" class="form-label fw-normal">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" value="{{(old('name'))?old('name'):$user->name}}">
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label fw-normal">NIK</label>
                <input type="number" class="form-control" id="nik" name="nik" value="{{(old('nik'))?old('nik'):$user->nik}}">
            </div>
            <div class="mb-3">
                <label for="tgl_lahir" class="form-label fw-normal">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{(old('tgl_lahir'))?old('tgl_lahir'):$user->tgl_lahir}}">
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label fw-normal">Jenis Kelamin</label>
                <div class="row ms-1">
                    <div class="col form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Pria" {{$user->jenis_kelamin == 'Pria' ? 'checked' : '' }}>
                        <label class="form-check-label" for="jenis_kelamin">
                            Pria
                        </label>
                    </div>
                    <div class="col form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Wanita" {{$user->jenis_kelamin == 'Wanita' ? 'checked' : '' }}>
                        <label class="form-check-label" for="jenis_kelamin">
                            Wanita
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label fw-normal">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control">{{(old('alamat'))?old('alamat'):$user->alamat}}</textarea>
            </div>
            <div class="mb-3">
                <label for="riwayat_pendidikan" class="form-label fw-normal">Riwayat Pendidikan</label>
                <input type="text" class="form-control" id="riwayat_pendidikan" name="riwayat_pendidikan" value="{{(old('riwayat_pendidikan'))?old('riwayat_pendidikan'):$user->riwayat_pendidikan}}">
            </div>
        </div>
    </div>
    <div class="col text-center">
        <button type="submit" class="btn btn-tambah mx-auto">Simpan</button>
    </div>
    </form>
</div>

<div class="card p-4">
    <form action="{{ route('relawan.update.password')}}" enctype="multipart/form-data" method="post">
    @method("PUT")    
    @csrf
    <h5 class="fw-bold mb-3">Ubah Password</h5>
    <div class="mb-3">
        <label for="current_password" class="form-label fw-normal">Password Lama</label>
        <input type="password" class="form-control" id="current_password" name="current_password">
        @error('current_password')
        <div class="alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="new_password" class="form-label fw-normal">Password Baru</label>
        <input type="password" class="form-control" id="new_password" name="new_password">
        @error('new_password')
        <div class="alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="con_password" class="form-label fw-normal">Konfirmasi Password Baru</label>
        <input type="password" class="form-control" id="con_password" name="con_password">
        @error('con_password')
        <div class="alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="col text-center">
        <button type="submit" class="btn btn-tambah mx-auto">Simpan</button>
    </div>
    </form>
</div>
@endsection