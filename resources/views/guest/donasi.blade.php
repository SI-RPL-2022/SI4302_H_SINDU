@extends('layouts.app')
@section('content')
<div class="container">   
  <div class="row">
    <div class="col-sm">
        <h5>Silahkan transfer ke salah satu nomor rekening di bawah ini.</h5>
        <div class="container me-2 p-0">
            <div class="row mb-4" >
                <div class="col">
                    <div class="card" style="height: 150px;">
                        <div class="card-body" style="text-align:center;">
                            <img src="https://drive.google.com/uc?export=view&id=1xHwo7FBMOpDp1hdub7tKeivNTCKL0WZu" alt="" style="width:150px; margin-bottom: 10px;">
                            <p style="padding:0px; margin:0px;">6860123456</p>
                            <p style="padding:0px; margin:0px;">a.n. Sincere Education</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="height: 150px;">
                        <div class="card-body" style="text-align:center;">
                            <img src="https://drive.google.com/uc?export=view&id=15E-jHvEv4Kpu_bdETLScVk_Q7htv_GVs" alt="" style="width:150px; margin-bottom: 10px;">
                            <p style="padding:0px; margin:0px;">131001215124</p>
                            <p style="padding:0px; margin:0px;">a.n. Sincere Education</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card" style="height: 150px;">
                        <div class="card-body" style="text-align:center;">
                            <img src="https://drive.google.com/uc?export=view&id=1_ZPk0vd_XoIwjabGMPRD9bhcWYrg6NHk" alt="" style="width:150px; margin-bottom: 10px;">
                            <p style="padding:0px; margin:0px;">0856454122</p>
                            <p style="padding:0px; margin:0px;">a.n. Sincere Education</p>
                        </div>
                    </div>
                </div>
                <div class="col"> 
                    <div class="card" style="height: 150px;">
                        <div class="card-body" style="text-align:center;">
                            <img src="https://drive.google.com/uc?export=view&id=1yMgIUFuVHIwkPPq981qxAfrSF9YpzwEI" alt="" style="width:170px; margin: 10px; ">
                            <p style="padding:0px; margin:0px;">32612345672</p>
                            <p style="padding:0px; margin:0px;">a.n. Sincere Education</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card">
            <div class="card-body">
            <h2 style="text-align:center;">Form Donasi</h2>
            <form action="{{url('/donasi/create')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_donatur" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama_donatur" name="nama_donatur">
                </div>
                <div class="mb-3">
                    <label for="email_donatur" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email_donatur" aria-describedby="emailHelp" name="email_donatur">
                </div>
                <div class="mb-3">
                    <label for="total_donasi" class="form-label">Total Donasi</label>
                    <input type="number" class="form-control" id="total_donasi" name="total_donasi">
                </div>
                <div class="mb-3">
                    <label for="deskripsi_donasi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi_donasi" rows="2" name="deskripsi_donasi"></textarea>
                </div>
                <div class="mb-3">
                    <label for="bukti_transfer" class="form-label">Bukti Transfer</label>
                    <input class="form-control" type="file" id="bukti_transfer" name="bukti_transfer">
                </div>
                <button type="submit" class="btn" style="background-color:#297BBF; color:#fff;">Kirim</button>
            </form>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection