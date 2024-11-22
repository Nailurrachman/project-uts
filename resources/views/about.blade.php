@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Tentang Explore Sumenep</h1>
    <div class="row">
        <div class="col-md-6">
            <img src="https://example.com/sumenep.jpg" alt="Explore Sumenep" class="img-fluid rounded">
        </div>
        <div class="col-md-6">
            <h2>Apa itu Explore Sumenep?</h2>
            <p>
                Explore Sumenep adalah platform yang dirancang untuk membantu Anda menjelajahi keindahan dan kekayaan budaya Sumenep. 
                Dengan berbagai fitur seperti pencarian destinasi, pemesanan mudah, dan panduan wisata, kami berkomitmen untuk memberikan pengalaman terbaik bagi wisatawan lokal maupun mancanegara.
            </p>
            <h3>Visi Kami</h3>
            <p>Menjadikan Sumenep sebagai destinasi wisata unggulan yang dikenal secara nasional dan internasional.</p>
            <h3>Misi Kami</h3>
            <ul>
                <li>Memperkenalkan kekayaan budaya dan alam Sumenep ke dunia.</li>
                <li>Meningkatkan pengalaman wisata dengan teknologi modern.</li>
                <li>Mendukung ekonomi lokal melalui pariwisata yang berkelanjutan.</li>
            </ul>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h2 class="text-center">Tim Pengembang</h2>
        </div>
        <div class="col-md-4 text-center">
            <img src="https://example.com/developer1.jpg" alt="Developer 1" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
            <h5>Nama Developer 1</h5>
            <p>Front-End Developer</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="https://example.com/developer2.jpg" alt="Developer 2" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
            <h5>Nama Developer 2</h5>
            <p>Back-End Developer</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="https://example.com/developer3.jpg" alt="Developer 3" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
            <h5>Nama Developer 3</h5>
            <p>UI/UX Designer</p>
        </div>
    </div>
</div>
@endsection
