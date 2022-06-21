@extends('layouts.landing')
@section('title', 'Home')

@section('title-page', 'Home')
@section('content')
<div class="about-container d-flex p-3 align-items-end">
    <div class="p-3 mx-3">
        <div class="text-light p-3 mx-3">
            <h1 class="my-1 mx-3 fw-bold" style="font-size: 90px;">Tentang Kami</h1>
        </div>
    </div>
</div>
<div id="belajar-container">
    <div class="row align-items-center px-2">
        <div class="col-md-6 col-sm-12">
            <p style="font-family: 'Poppins'">{!! $data->data !!}</p>
        </div>
        <div class="col-md-6 col-sm-12 text-center">
            <div class="my-auto px-3 responsive-container">
                <h1 class="fw-bold lh-base" style="font-size: 5em"><span class="text-sindu-blue">Sin</span>cere E<span
                        class="text-sindu-blue">du</span>cation</h1>
                <a class="btn text-light bg-sindu my-3 btn-hover"
                    style="background-color: #297BBF; font-weight: 600; font-size: 1,8em; width:100%"
                    href="{{ route('register') }}">{{ __('DAFTAR JADI RELAWAN') }}</a>
            </div>
        </div>
    </div>
</div>
<hr class="container px-3">
<div id="team-container" class="team-container" class="p-3 text-center">
    <div class="row p-3 mb-2">
        <div class="col text-center">
            <h1 class="" style="font-weight: 800">Tim Sindu</h1>
        </div>
    </div>
    <div class="row px-3 text-center mb-3">
        <div class="col col-4 p-3">
            <img src="{{ asset('img/team/alfian.png') }}" class="img-team rounded-circle" alt="">
            <h3 class="mt-3 text-white fw-bold">Alfian</h3>
        </div>
        <div class="col col-4 p-3">
            <img src="{{ asset('img/team/ahmad.png') }}" class="img-team rounded-circle" alt="">
            <h3 class="mt-3 text-white fw-bold">Ahmad</h3>
        </div>
        <div class="col col-4 p-3">
            <img src="{{ asset('img/team/ari.png') }}" class="img-team rounded-circle" alt="">
            <h3 class="mt-3 text-white fw-bold">Ari</h3>
        </div>
    </div>
    <div class="row px-3 text-center pb-3">
        <div class="col col-6 p-3">
            <img src="{{ asset('img/team/naufal.png') }}" class="img-team rounded-circle" alt="">
            <h3 class="mt-3 text-white fw-bold">Naufal</h3>
        </div>
        <div class="col col-6 p-3">
            <img src="{{ asset('img/team/tiara.png') }}" class="img-team rounded-circle" alt="">
            <h3 class="mt-3 text-white fw-bold">Tiara</h3>
        </div>
    </div>
    <br>
    <br>

</div>
@endsection
