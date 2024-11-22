@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center py-5">
        <h1 class="display-4 text-primary animate__animated animate__fadeInDown">Selamat Datang di Explore Sumenep</h1>
        <p class="lead text-secondary animate__animated animate__fadeInUp">Jelajahi destinasi populer di Sumenep dengan mudah.</p>
        <a href="#" class="btn btn-primary btn-lg mt-3 animate__animated animate__zoomIn">Mulai Eksplorasi</a>
    </div>

    <div class="row mt-5">
        <!-- Card Section -->
        <div class="col-md-4">
            <div class="card shadow animate__animated animate__fadeInLeft">
                <img src="{{ asset('images/museum.jpeg') }}" class="card-img-top" alt="Keraton Sumenep">
                <div class="card-body">
                    <h5 class="card-title">Keraton Sumenep</h5>
                    <p class="card-text">Wisata budaya dengan arsitektur megah yang penuh sejarah.</p>
                    <a href="#" class="btn btn-outline-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow animate__animated animate__fadeInUp">
                <img src="{{ asset('images/pantai-lombang.jpg') }}" class="card-img-top" alt="Pantai Lombang">
                <div class="card-body">
                    <h5 class="card-title">Pantai Lombang</h5>
                    <p class="card-text">Pantai indah dengan pasir putih dan pohon cemara udang yang unik.</p>
                    <a href="#" class="btn btn-outline-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow animate__animated animate__fadeInRight">
                <img src="{{ asset('images/goa-soekarno.jpg') }}" class="card-img-top" alt="Goa Soekarno">
                <div class="card-body">
                    <h5 class="card-title">Goa Soekarno</h5>
                    <p class="card-text">Destinasi misterius dengan legenda menarik di dalamnya.</p>
                    <a href="#" class="btn btn-outline-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <h2 class="text-secondary animate__animated animate__fadeIn">Kenapa Memilih Sumenep?</h2>
        <p class="text-muted mt-3 animate__animated animate__fadeIn">Sumenep menawarkan keindahan alam, budaya yang kaya, dan pengalaman yang tak terlupakan.</p>
        <a href="#" class="btn btn-outline-secondary btn-lg animate__animated animate__bounceIn">Pelajari Lebih Lanjut</a>
    </div>
</div>
@endsection

