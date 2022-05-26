@extends('layouts.sidebar')

@section('content')

<div class="row row-cols-1 row-cols-md-2 g-4">
    @foreach ($data as $key => $datas)
    <div class="col">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="" class="img-fluid rounded-start" alt="">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $datas->nama_lengkap }}</h5>
                        <p class="card-text"><small class="text-muted">{{ $datas->no_hp }}</small></p>
                        <p class="card-text">{{ $datas->deskripsi }}</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalikut">Ikuti</button>
                        <button type="button" class="btn btn-dark">Lihat Detail</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- Modal -->
<div class="modal fade" id="modalikut" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalikut" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <form action="{{url('/relawan/mendaftar')}}" class="contact100-form validate-form" method="POST">
                    @csrf
                    <div class="mb-3 hidden">
                        <label for="id_pengajuan_relawan" class="form-label hidden"></label>
                        <input type="number" class="form-control hidden" id="id_pengajuan_relawan" name="id_pengajuan_relawan" required hidden>
                    </div>
                    <div class="mb-3">
                        <label for="nama_relawan" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_relawan" name="nama_relawan" required>
                    </div>
                    <div class="mb-3">
                        <label for="email_relawan" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email_relawan" aria-describedby="emailHelp" name="email_relawan" required>
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="number" class="form-control" id="nik" name="nik" required>
                    </div>
                    <div class="mb-3">
                        <label for="berkas_ktp" class="form-label">Foto Selfie Bersama KTP</label>
                        <input class="form-control" type="file" id="berkas_ktp" name="berkas_ktp" required>
                    </div>
                    <div class="mb-3">
                        <label for="berkas_cv" class="form-label">Berkas</label>
                        <input class="form-control" type="file" id="berkas_cv" name="berkas_cv" required>
                    </div>
                    <button type="submit" class="btn" style="background-color:#297BBF; color:#fff;">Kirim</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
    @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@endsection