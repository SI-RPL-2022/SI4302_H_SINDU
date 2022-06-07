@extends('layouts.landing')
@section('title', 'Materi')

@section('extend-css')
<style>
    .fit-cover {
        object-fit: cover;
    }

    #form1{
        background-color:white;
    }

    @media (min-width: 768px) {
        .fit-cover {
            position: absolute;
        }
    }
</style>
@endsection 

@section('content')
<div class="title-materi-container"></div>
<div class="container mt-4">
    <div class="mb-2">
        <div class="fw-bold fs-4 mb-2" style="color:#297BBF;">Yuk Selesaikan!</div>
        <div class="row g-2">
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-sm-5 position-relative">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUdV_5sTPgc0YHfgAu9j7KZi7ELdM5ORfBxg&usqp=CAU" class="card-img fit-cover w-100 h-100" alt="...">
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a class="link-dark text-decoration-none" style="font-size:14px;" href="#" target="_blank">Perkalian Dasar untuk Sekolah Dasar</a>
                                </h5>
                                <p class="card-text text-muted" style="font-size:12px;">Ujang Hernandes</p>
                                <p class="card-text" style="font-size:10px;">Kelas VI, Matematika</p>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>                      
        </div>
    </div>  
    <div class="mt-5 mb-5">
        <div class="row g-2 mb-2">
            <div class="col-12 col-md-12 col-lg-7 text-start">
                <div class="fw-bold fs-4 mb-2" style="color:#297BBF;">Direkomendasikan Untukmu!</div>
            </div>    
            <div class="col-6 col-md-6 col-lg-2 text-end">
                <a href="" class="btn btn-sm btn-outline-secondary">+ Tambah Filter</a>
            </div>                
            <div class="col-6 col-md-6 col-lg-3 text-end">                
                <div class="input-group">                                    
                    <input type="search" placeholder="Cari" id="form1" class="form-control form-control-sm" />                                            
                    <button type="button" class="btn btn-sm btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>            
        </div>        
        <div class="row g-2">
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-sm-5 position-relative">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUdV_5sTPgc0YHfgAu9j7KZi7ELdM5ORfBxg&usqp=CAU" class="card-img fit-cover w-100 h-100" alt="...">
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a class="link-dark text-decoration-none" style="font-size:14px;" href="#" target="_blank">Perkalian Dasar untuk Sekolah Dasar</a>
                                </h5>
                                <p class="card-text text-muted" style="font-size:12px;">Ujang Hernandes</p>
                                <p class="card-text" style="font-size:10px;">Kelas VI, Matematika</p>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>    
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-sm-5 position-relative">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUdV_5sTPgc0YHfgAu9j7KZi7ELdM5ORfBxg&usqp=CAU" class="card-img fit-cover w-100 h-100" alt="...">
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a class="link-dark text-decoration-none" style="font-size:14px;" href="#" target="_blank">Perkalian Dasar untuk Sekolah Dasar</a>
                                </h5>
                                <p class="card-text text-muted" style="font-size:12px;">Ujang Hernandes</p>
                                <p class="card-text" style="font-size:10px;">Kelas VI, Matematika</p>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>    
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-sm-5 position-relative">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUdV_5sTPgc0YHfgAu9j7KZi7ELdM5ORfBxg&usqp=CAU" class="card-img fit-cover w-100 h-100" alt="...">
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a class="link-dark text-decoration-none" style="font-size:14px;" href="#" target="_blank">Perkalian Dasar untuk Sekolah Dasar</a>
                                </h5>
                                <p class="card-text text-muted" style="font-size:12px;">Ujang Hernandes</p>
                                <p class="card-text" style="font-size:10px;">Kelas VI, Matematika</p>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-sm-5 position-relative">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUdV_5sTPgc0YHfgAu9j7KZi7ELdM5ORfBxg&usqp=CAU" class="card-img fit-cover w-100 h-100" alt="...">
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a class="link-dark text-decoration-none" style="font-size:14px;" href="#" target="_blank">Perkalian Dasar untuk Sekolah Dasar</a>
                                </h5>
                                <p class="card-text text-muted" style="font-size:12px;">Ujang Hernandes</p>
                                <p class="card-text" style="font-size:10px;">Kelas VI, Matematika</p>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>     
        </div>
    </div>          
</div>
@endsection
