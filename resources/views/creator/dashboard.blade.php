@extends('layouts.app')

@section('content')

<div class="container-fluid">

<div class="mb-4">
    <h1>Dashboard Creator</h1>
    <p class="text-muted">
        Selamat datang, {{ Auth::user()->name }}!
    </p>
</div>

<div class="row">

    {{-- Profile --}}
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Profil Saya</h5>
                <p class="card-text">
                    Kelola informasi profil, bio, nomor telepon,
                    foto profil, dan pengalaman.
                </p>
                <a href="#" class="btn btn-primary">
                    Kelola Profil
                </a>
            </div>
        </div>
    </div>

    {{-- Services --}}
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Layanan Saya</h5>
                <p class="card-text">
                    Kelola layanan pembuatan CV yang kamu tawarkan.
                </p>
                <a href="#" class="btn btn-primary">
                    Kelola Layanan
                </a>
            </div>
        </div>
    </div>

    {{-- Portfolio --}}
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Portfolio</h5>
                <p class="card-text">
                    Tambahkan dan kelola hasil pekerjaan CV.
                </p>
                <a href="#" class="btn btn-primary">
                    Kelola Portfolio
                </a>
            </div>
        </div>
    </div>

    {{-- Orders --}}
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pesanan Masuk</h5>
                <p class="card-text">
                    Lihat pesanan dari customer dan proses
                    pesanan yang masuk.
                </p>
                <a href="#" class="btn btn-primary">
                    Lihat Pesanan
                </a>
            </div>
        </div>
    </div>

</div>

</div>

@endsection
