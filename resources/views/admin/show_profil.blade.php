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
    <form action="{{ route('admin.update.profil')}}" enctype="multipart/form-data" method="POST">
        @method("PUT")
        @csrf
    <div class="row g-3">
        <div class="col-md-4">
            <img src="{{ asset('image/profil/'. $user->foto_profile) }}" alt="" style="width:200px; height:200px; float:center; border-radius:50%; margin-left: 40px; object-fit:cover;" >
            <input type="file" name="foto_profile" style="margin-left:40px; margin-top:20px; margin-bottom:62px;">
        </div>
        <div class="col-md-8">
            <h5 class="fw-bold mb-3">Informasi Akun</h5>
            <div class="mb-3">
                <label for="name" class="form-label fw-normal">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" value="{{(old('name'))?old('name'):$user->name}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-normal">Alamat Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{(old('email'))?old('email'):$user->email}}">
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label fw-normal">Nomor HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{(old('no_hp'))?old('no_hp'):$user->no_hp}}">
            </div>
        </div>
    </div>
    <div class="col text-center">
        <button type="submit" class="btn btn-tambah mb-2 mt-2" >Simpan</button>
    </div>
    </form>
</div>
<div class="card p-4">
    <form action="{{ route('admin.update.password')}}" enctype="multipart/form-data" method="POST">
    @method ("PUT")
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
                <button type="submit" class="btn btn-tambah mb-2 mt-2" >Simpan</button>
            </div>
            
        </form>
</div>

@endsection