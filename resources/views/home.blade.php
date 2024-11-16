@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center py-5">
        <h1 class="display-4 text-primary animate__animated animate__fadeInDown">Selamat Datang di Sistem Booking TI_22</h1>
        <p class="lead text-secondary animate__animated animate__fadeInUp">Temukan rumah impian Anda dengan cepat dan mudah.</p>
        <a href="#" class="btn btn-primary btn-lg mt-3 animate__animated animate__zoomIn">Mulai Booking</a>
    </div>

    <div class="row mt-5">
        <!-- Card Section -->
        <div class="col-md-4">
            <div class="card shadow animate__animated animate__fadeInLeft">
                <img src="/images/house1.jpg" class="card-img-top" alt="House 1">
                <div class="card-body">
                    <h5 class="card-title">Rumah Nyaman</h5>
                    <p class="card-text">Lokasi strategis dengan fasilitas lengkap untuk keluarga Anda.</p>
                    <a href="#" class="btn btn-outline-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow animate__animated animate__fadeInUp">
                <img src="/images/house2.jpg" class="card-img-top" alt="House 2">
                <div class="card-body">
                    <h5 class="card-title">Vila Eksklusif</h5>
                    <p class="card-text">Nikmati liburan Anda di vila mewah dengan pemandangan indah.</p>
                    <a href="#" class="btn btn-outline-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow animate__animated animate__fadeInRight">
                <img src="/images/house3.jpg" class="card-img-top" alt="House 3">
                <div class="card-body">
                    <h5 class="card-title">Apartemen Modern</h5>
                    <p class="card-text">Cocok untuk kaum urban yang mencari kenyamanan di tengah kota.</p>
                    <a href="#" class="btn btn-outline-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <h2 class="text-secondary animate__animated animate__fadeIn">Kenapa Memilih Kami?</h2>
        <p class="text-muted mt-3 animate__animated animate__fadeIn">Kami memberikan kemudahan, transparansi, dan kepercayaan untuk memenuhi kebutuhan Anda.</p>
        <a href="#" class="btn btn-outline-secondary btn-lg animate__animated animate__bounceIn">Pelajari Lebih Lanjut</a>
    </div>
</div>
@endsection
