@extends('layouts.landing')
@section('title', 'Home')

@section('title-page', 'Home')
@section('content')
<div class="title-container d-flex align-items-center justify-content-center">
    <div class="my-auto">
        <div class="text-center text-light">
            <h1 class="my-1">Sincere Education</h1>
            <p class="my-1 fw-light">memberikan edukasi dengan ikhlas.</p>
        </div>
        <div class="text-center my-3">
            <a class="btn text-light bg-sindu mx-3" style="background-color: #297BBF; font-weight: 600; width: 12em;"
                href="{{ route('login') }}">{{ __('Menjadi Relawan') }}</a>
            <a class="btn text-light bg-sindu mx-3" style="background-color: #297BBF; font-weight: 600; width: 12em;"
                href="{{ route('login') }}">{{ __('Cari Relawan') }}</a>
        </div>
    </div>
</div>
<div id="belajar-container">
    <div class="row align-items-center px-2">
        <div class="col-md-6 col-sm-12">
            <img src="{{ asset('img/belajar.png') }}" class="img-responsive" alt="">
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="my-auto px-3">
                <h2 class="fw-bold lh-base my-3 text-break">Akses materi belajar secara gratis demi Indonesia yang lebih
                    baik!</h2>
                <a class="btn text-light bg-sindu my-3"
                    style="background-color: #297BBF; font-weight: 600; width: 12em;"
                    href="{{ route('login') }}">{{ __('Mulai Belajar') }}</a>
            </div>
        </div>
    </div>
</div>
<div id="testimoni-container" class="bg-sindu text-white p-3">
    <div class="row">
        <div class="col">
            <div class="text-center p-3">
                <h2 class="fw-bold my-1">Testimoni</h2>
                <p class="fw-light my-1">kata mereka yang pernah menggunakan sindu</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1 d-flex aligns-items-center justify-content-center">
            <a class="pp2 btn text-white text-decoration-none d-inline d-flex aligns-items-center "><i
                    class="fa-solid fa-chevron-left my-auto"></i></a>
        </div>
        <div class="col-md-10">
            <div class="multiple-items text-center p-3">
                @foreach($testimoni as $item)
                    <div class="card h-100">
                        <div class="card-body bg-sindu">
                            <h5 class="card-title fw-bold">{{ $item->nama }}</h5>
                            <p class="card-text">{{ $item->deskripsi_testimoni }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-1 d-flex aligns-items-center justify-content-center">
            <a class="nn2 btn text-white text-decoration-none d-inline d-flex aligns-items-center "><i
                    class="fa-solid fa-chevron-right my-auto"></i></a>
        </div>
    </div>
    <br>
    <br>
</div>
<div id="supporter-container" class="p-3 text-center">
    <div class="row p-3">
        <div class="col">
            <h5 class="fw-light">Didukung oleh:</h5>
        </div>
        <div class="row">
            <div class="col p-3">
                <img src="{{ asset('img/supports.png') }}" alt="">
            </div>
        </div>
    </div>
    <br>
    <br>
</div>
<script>
    $('.multiple-items').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        prevArrow: $(".pp2"),
        nextArrow: $(".nn2"),
    });

</script>
@endsection
