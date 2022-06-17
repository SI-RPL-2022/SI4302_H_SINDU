@extends('layouts.sidebar')

@section('title', 'Konfigurasi Web')

@section('title-page', 'Konfigurasi Web')

@section('content')
<div class="row justify-content-center">        
    <div class="col-md-12">            
        @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>
            {{ session('success') }}
        </div>        
        @elseif (session('error'))
        <div class="alert alert-error alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Error!</h5>
            {{ session('error') }}
        </div> 
        @endif                                     
        <div class="card">
            <div class="card-header text-center">                
                <h6 class="mx-auto">Menu Konfigurasi Web</h6>          
            </div>      
            <div class="card-body table-responsive p-3 text-center" >
                <form action="/admin/aboutus/store" enctype="multipart/form-data" method="POST">
                @csrf
                 @if ($data != null)
                 <input type="text" name="id" value="{{ $data->id }}" hidden>
                 @endif
                <div class="row mb-3 mt-3 align-items-center">
                        <label for="data" class="col-3 col-form-label">Tentang Kami</label>
                    <div class="col col-9">
                        <textarea name="data" id="editor" rows="3">{{ ($data != null) ? $data->data : '' }}</textarea>
                    </div>
                </div>
                <button class="btn btn-sm btn-tambah" type="submit">Simpan</button>
                </form>
            </div>                        
        </div>  
    </div>
</div>
<script src="{{ asset('js/build/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ),  {
        fontFamily: {
            options: [
                'default',
                'Poppins, sans-serif',
            ]
        }
    } )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection