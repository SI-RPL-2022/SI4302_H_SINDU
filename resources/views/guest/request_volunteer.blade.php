@extends('layouts.app')
@section('content')
<div class="container">   
  <div class="row">
    <div class="col-sm">
        <div class="card rounded">
            <div class="card-body">
            <h2 style="text-align:center;">Form Mengajukan Bantuan Relawan</h2>
            <form action="{{url('/request-volunteer')}}" class="contact100-form validate-form" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                </div>
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Organisasi</label>
                    <input type="text" class="form-control" id="nama_organisasi" name="nama_organisasi" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                </div>
                <div class="mb-3">
                    <label for="startDate" class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="startDate" name="startDate" required>
                </div>
                <div class="mb-3">
                    <label for="endDate" class="form-label">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="endDate" name="endDate" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" rows="2" name="deskripsi" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="berkas" class="form-label">Berkas</label>
                    <input class="form-control" type="file" id="berkas" name="berkas" required>
                </div>
                <button type="submit" class="btn" style="background-color:#297BBF; color:#fff;">Kirim</button>
            </form>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card mb-3 text-center border-0">
            <img class="card-img-top rounded" src="https://drive.google.com/uc?export=view&id=15bCG3yf_rPay2I9nyOIF6Q7utBhxXb05" alt="Card image cap" style="height:380px;">
            <div class="card-body">
                <h5 class="card-title">Ada pertanyaan?</h5>
                <h5 class="card-title">Silahkan hubungi kami</h5>
                <a href="https://wa.me/+6282236056658">
                    <img src="https://drive.google.com/uc?export=view&id=1x-s4ptFO022bMUGq6i6DnmFVMor5NTxv" width="80px" height="80px"/>
                </a>
                <a href="mailto:sincereeducation22@gmail.com">
                    <img src="https://drive.google.com/uc?export=view&id=1fpjr6XPCp4-QUwxwpiP0Ml2bV-fHtzf7" width="80px" height="60.31px"/>
                </a>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection