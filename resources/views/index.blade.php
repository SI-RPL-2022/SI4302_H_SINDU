@extends('layouts.landing')
@section('content')
<div class="title-container align-center">
    <div class="my-auto">
        <div class="text-center align-items-center text-light">
            <h1 class="my-1">Sincere Education</h1>
            <p class="my-1">memberikan edukasi dengan ikhlas.</p>
        </div>
        <div class="text-center align-items-center my-3">
            <a class="btn text-light bg-sindu mx-3" style="background-color: #297BBF; font-weight: 600; width: 12em;"
                href="{{ route('login') }}">{{ __('Menjadi Relawan') }}</a>
            <a class="btn text-light bg-sindu mx-3" style="background-color: #297BBF; font-weight: 600; width: 12em;"
                href="{{ route('login') }}">{{ __('Cari Relawan') }}</a>
        </div>
    </div>
</div>
<div id="belajar-container">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-12">
            <img src="{{ asset('img/belajar.png') }}" class="img-responsive" alt="">
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="my-auto">
                <h2 class="fw-bold lh-base my-3 text-break">Akses materi belajar secara gratis demi Indonesia yang lebih baik!</h2>
                <a class="btn text-light bg-sindu my-3" style="background-color: #297BBF; font-weight: 600; width: 12em;"
                    href="{{ route('login') }}">{{ __('Mulai Belajar') }}</a>
            </div>
        </div>

    </div>
</div>
@endsection
