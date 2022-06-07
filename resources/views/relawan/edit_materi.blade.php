@extends('layouts.sidebar')

@section('title', 'Edit Materi')

@section('title-page', 'Edit Materi')

@section('content')
    <div class="row justify-content-center">        
        <div class="col-md-12">
            <div class="card shadow border-0 mb-7">
                <div class ="card-body">
                    <form action="{{ url('/relawan/materi/update/'.$data->id_materi) }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group mb-2">
                            <label for="">Judul Materi</label>
                            <input type="text" class="form-control form-control-sm @error('judul_materi') is-invalid @enderror" name="judul_materi" value="{{ $data->judul_materi }}">
                            @error('judul_materi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>   
                        <div class="form-group mb-2">
                            <label for="">Mata Pelajaran</label>
                            <select name="id_mata_pelajaran" class="custom-select custom-select-sm @error('id_mata_pelajaran') is-invalid @enderror">                                                                
                                @foreach($mapel as $mapels)
                                    <option value="{{ $mapels->id_mata_pelajaran }}" {{ $data->id_mata_pelajaran == $mapels->id_mata_pelajaran ? 'selected' : '' }}>{{ $mapels->nama_mata_pelajaran }} - Kelas {{ $mapels->nama_kelas }}</option>                            
                                @endforeach                        
                            </select> 
                            @error('id_mata_pelajaran')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>  
                        <div class="form-group mb-2">
                            <label for="exampleInputFile">Cover Materi</label>
                            <div class="custom-file">                                
                                <input type="file" class="custom-file-input @error('cover_materi') is-invalid @enderror" name="cover_materi_new">                   
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                <input type="text" name="cover_materi" value="{{ $data->cover_materi }}" hidden>  
                                @error('cover_materi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                            
                        </div>  
                        <div class="form-group mb-2">
                            <label for="">Link Video (Opsional)</label>
                            <input type="text" class="form-control form-control-sm @error('video_materi') is-invalid @enderror" name="video_materi" value="{{ $data->video_materi }}">
                            @error('video_materi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 
                        <div class="form-group mb-2">
                            <label for="">Deskripsi Materi</label>
                            <textarea name="deskripsi_materi" id="editor" class="form-control form-control-sm @error('deskripsi_materi') is-invalid @enderror">{{ $data->deskripsi_materi }}</textarea>
                            @error('deskripsi_materi')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>                         
                        <input type="text" name="id_users" value="{{ $data->id_users }}" hidden>                    
                        <button class="btn btn-sm btn-tambah mt-2" type="submit">Simpan</button>
                    </form>
                </div>              
            </div>
        </div>
    </div>
@endsection

@section('add_ck-editor')
<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
