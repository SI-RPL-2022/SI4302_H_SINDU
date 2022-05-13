@extends('layouts.sidebar')

@section('title', 'Testimoni')

@section('title-page', 'Testimoni')

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
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-sm btn-tambah" data-toggle="modal" data-target="#tambahTestimoni">
                    Tambah Testimoni
                </button>
                <div class="modal fade" id="tambahTestimoni">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Testimoni</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.store.testimoni') }}"
                                    enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="form-group mb-1">
                                        <label for="">Nama</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('nama') is-invalid @enderror"
                                            name="nama" id="nama" value="{{ old('nama') }}">
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="role">Role</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('role') is-invalid @enderror"
                                            name="role" id="role" value="{{ old('role') }}">
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="foto" class="form-label">Foto</label>
                                        <input class="form-control @error('foto') is-invalid @enderror" id="foto"
                                            type="file" name="foto">
                                        @error('foto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Deskripsi Testimoni</label>
                                        <textarea id="deskripsi_testimoni1" name="deskripsi_testimoni"
                                            class="form-control form-control-sm @error('deskripsi_testimoni') is-invalid @enderror"
                                            style="resize:none;">{{ old('deskripsi_testimoni') }}</textarea>
                                        <span id="remain1">255 / 255</span>
                                        @error('deskripsi_testimoni')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <input type="text" name="id_users" value="{{ Auth::user()->id }}" hidden>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
                                <button class="btn btn-sm btn-tambah" type="submit">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-tools mt-1">
                    <form action="{{ route('admin.cari.testimoni') }}" method="get">
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
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($data as $datas)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $datas->nama }}</td>
                                <td>{{ $datas->created_at }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal"
                                        data-target="#showDetailTestimoni_{{ $datas->id_testimoni }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <div class="modal fade" id="showDetailTestimoni_{{ $datas->id_testimoni }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail Testimoni</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-1">
                                                        <div class="col-3">
                                                            <p style="font-size:15px;" class="mb-1">Dibuat Oleh</p>
                                                        </div>
                                                        <div class="col-1">
                                                            <p style="font-size:15px;" class="mb-1">:</p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p>{{ $datas->nama }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-1">
                                                        <div class="col-3">
                                                            <p style="font-size:15px;" class="mb-1">Foto</p>
                                                        </div>
                                                        <div class="col-1">
                                                            <p style="font-size:15px;" class="mb-1">:</p>
                                                        </div>
                                                        <div class="col-8">
                                                            <div><img
                                                                    src="{{ asset('profil_testimoni/'.$datas->foto.'') }}"
                                                                    class="img-fluid" alt=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <div class="col-3">
                                                            <p style="font-size:15px;" class="mb-1">Role</p>
                                                        </div>
                                                        <div class="col-1">
                                                            <p style="font-size:15px;" class="mb-1">:</p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p>{{ $datas->role }}</p>
                                                        </div>
                                                    </div>
                                                    <p style="font-size:13px;">{{ $datas->deskripsi_testimoni }}</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-sm btn-default"
                                                        data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#editTestimoni_{{ $datas->id_testimoni }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <div class="modal fade" id="editTestimoni_{{ $datas->id_testimoni }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Testimoni</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="{{ url('/admin/testimoni/update/'.$datas->id_testimoni) }}"
                                                        enctype="multipart/form-data" method="post">
                                                        @csrf
                                                        <div class="form-group mb-1">
                                                            <label for="">Nama</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('nama') is-invalid @enderror"
                                                                name="nama" value="{{ $datas->nama }}">
                                                            @error('nama')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label for="role">Role</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm @error('role') is-invalid @enderror"
                                                                name="role" id="role" value="{{ $datas->role }}">
                                                            @error('role')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label for="foto" class="form-label">Foto</label>
                                                            <input
                                                                class="form-control @error('foto') is-invalid @enderror"
                                                                id="foto" type="file" name="foto"
                                                                value="{{ $datas->foto }}">
                                                            @error('foto')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="">Deskripsi Testimoni</label>
                                                            <textarea id="deskripsi_testimoni2" name="deskripsi_testimoni"
                                                                class="form-control form-control-sm @error('deskripsi_testimoni') is-invalid @enderror"
                                                                style="resize:none;">{{ $datas->deskripsi_testimoni }}</textarea>
                                                                <span id="remain2">255</span>
                                                            @error('deskripsi_testimoni')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <input type="text" name="id_users"
                                                            value="{{ Auth::user()->id }}" hidden>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-sm btn-default"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button class="btn btn-sm btn-tambah" type="submit">Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ url('/admin/testimoni/delete/'.$datas->id_testimoni) }}"
                                        class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var maxlen = 255;
        $("#deskripsi_testimoni1").keyup(function (e) {

            // Finding total characters in Textarea
            var txtLen = $(this).val().length;

            if (txtLen <= maxlen) {
                var remain = maxlen - txtLen + ' / ' + maxlen;

                // Updating 1ing character count
                $("#remain1").text(remain);
            }
        });


        $("#deskripsi_testimoni1").keydown(function (e) {
            var keycode1 = e.keyCode;

            // Finding total characters in Textarea 
            var txtLen = $(this).val().length;

            if (txtLen > maxlen) {

                // when keycode is not of backspace
                if (keycode1 != 8) {
                    // Stopping new character to enter
                    // e.preventDefault();
                    return false;
                }
            }
        });
        $("#deskripsi_testimoni2").keyup(function (e) {

            // Finding total characters in Textarea
            var txtLen = $(this).val().length;

            if (txtLen <= maxlen) {
                var remain = maxlen - txtLen + ' / ' + maxlen;

                // Updating remaining character count
                $("#remain2").text(remain);
            }
        });


        $("#deskripsi_testimoni2").keydown(function (e) {
            var keycode = e.keyCode;

            // Finding total characters in Textarea 
            var txtLen = $(this).val().length;

            if (txtLen > maxlen) {

                // when keycode is not of backspace
                if (keycode != 8) {
                    // Stopping new character to enter
                    // e.preventDefault();
                    return false;
                }
            }
        });
    });

</script>
@endsection
