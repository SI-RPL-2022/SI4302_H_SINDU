@extends('layouts.landing')
@section('title', 'Detail Materi')

@section('extend-css')
<style>
    .fit-cover {
        object-fit: cover;
    }

    @media (min-width: 768px) {
        .fit-cover {
            position: absolute;
        }
    }
</style>
@endsection 

@section('content')
<div style="background-image: url({{ url('/image/cover/'.$data->cover_materi) }}); background-size: cover; height: 40em;"></div>
<div class="container mt-4 mb-4">
    <div class="mb-2">
        <div class="fw-bold fs-1">{{ $data->judul_materi }}</div>
        <div class="fw-light" style="font-size:14px;">oleh: {{ $data->name }}</div>
        <div class="text-muted" style="font-size:12px;">{{ $data->created_at }}</div>
        <div align="justify">
            <p>{!! $data->deskripsi_materi !!}</p>
        </div> 
        @if($data->video_materi != "Tidak Ada")
        <div class="text-start">
            Link Video: <a href="{{ $data->video_materi }}" target="_blank">{{ $data->video_materi }}</a>
        </div>
        @endif
    </div>           
</div>
@endsection
