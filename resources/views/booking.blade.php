@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Booking Destinasi</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('booking.submit') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                        </div>

                        <div class="mb-3">
                            <label for="destination" class="form-label">Pilih Destinasi</label>
                            <select class="form-select" id="destination" name="destination" required>
                                <option value="" selected disabled>Pilih salah satu destinasi</option>
                                <option value="Keraton Sumenep">Keraton Sumenep</option>
                                <option value="Pantai Lombang">Pantai Lombang</option>
                                <option value="Goa Soekarno">Goa Soekarno</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Tanggal Kunjungan</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>

                        <div class="mb-3">
                            <label for="guests" class="form-label">Jumlah Pengunjung</label>
                            <input type="number" class="form-control" id="guests" name="guests" placeholder="Masukkan jumlah pengunjung" required>
                        </div>

                        <div class="mb-3">
                            <label for="note" class="form-label">Catatan (Opsional)</label>
                            <textarea class="form-control" id="note" name="note" rows="3" placeholder="Tambahkan catatan jika ada"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Kirim Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
