@section('extend-css')
<style>
    {
        html, body{
            margin: 0;
            padding: 0;
            overflow-x:hidden;
        },
           

        @media(max-width:500px){
            .footer-col {
                width:80%;
                margin-bottom:30px;
            }
        }
</style>
@endsection
    <footer class="footer mt-auto">
        <div class="footer-content text-white pt-5 pb-5" style="background-color:#297BBF; border-radius: 1em 1em 0 0;">
            <div class="row ms-5">
                <div class="footer-col col-6 mt-2">
                    <p class="me-5 pe-5"><strong>Sindu</strong> merupakan platform fasilitator antara relawan dengan organisasi/komunitas sosial dibidang pendidikan.</p>
                    <p class="fw-bold mt-5">Memberikan pendidikan dengan ikhlas.</p>
                </div>
                <div class="footer-col col mt-2 ">
                    <p class="fw-bold">Sindu</p>
                    <a href="" class="text-white text-decoration-none">Tentang Kami</a> <br>
                    <a href="{{ route('donasi.create') }}" class="text-white text-decoration-none">Donasi</a> <br>
                    <a href="" class="text-white text-decoration-none">Umpan Balik</a> <br>
                    <a href="" class="text-white text-decoration-none">Syarat dan Ketentuan</a> <br>
                    <a href="" class="text-white text-decoration-none">Kebijakan Privasi</a> <br>
                    <a href="" class="text-white text-decoration-none">Donator</a> <br>
                    <a href="" class="text-white text-decoration-none">Kontak Kami</a>
                </div>
                <div class="footer-col col mt-2">
                    <p class="fw-bold">Sincerely, for you</p>
                    <a href="/register" class="text-white text-decoration-none">Menjadi Relawan</a> <br>
                    <a href="{{ route('request_volunteer.create') }}" class="text-white text-decoration-none">Cari Relawan</a> <br>
                    <a href="" class="text-white text-decoration-none">Materi Belajar</a> <br>
                    <a href="" class="text-white text-decoration-none">Panduan Relawan</a> <br>
                    <a href="" class="text-white text-decoration-none">Panduan Organisasi</a> 
                </div>
            </div>
            <div class="row ms-5">
                <div class="col-1">
                    <h3 class="fw-bold ms-2">Sindu</h3>
                </div>
                <div class="col">
                    <ul class="social" style="list-style:none; display:flex;">
                        <li><a href="" style="color:#fff; font-size:1.5rem;"><i class="fa fa-instagram ms-5 me-4"></i></a></li>
                        <li><a href="" style="color:#fff; font-size:1.5rem;"><i class="fa fa-facebook me-4"></i></a></li>
                        <li><a href="" style="color:#fff; font-size:1.5rem;"><i class="fa fa-twitter me-4"></i></a></li>
                        <li><a href="" style="color:#fff; font-size:1.5rem;"><i class="fa fa-youtube me-4"></i></a></li>
                    </ul>
                </div>                
            </div>
        </div>
    </footer>