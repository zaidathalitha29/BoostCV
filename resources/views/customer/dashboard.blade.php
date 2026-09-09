@extends('layouts.app')

@section('content')

<div class="container-fluid">

<div class="mb-4">
    <h1>Dashboard Customer</h1>
    <p class="text-muted">
        Selamat datang, {{ Auth::user()->name }}!
    </p>
</div>

<div class="row">

    {{-- Services --}}
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Cari Layanan CV</h5>
                <p class="card-text">
                    Lihat berbagai layanan pembuatan CV yang tersedia
                    di BoostCV.
                </p>
                <a href="#" class="btn btn-primary">
                    Lihat Layanan
                </a>
            </div>
        </div>
    </div>

    {{-- Creator --}}
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Creator</h5>
                <p class="card-text">
                    Lihat creator dan portfolio yang tersedia.
                </p>
                <a href="#" class="btn btn-primary">
                    Lihat Creator
                </a>
            </div>
        </div>
    </div>

    {{-- Create Order --}}
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Buat Pesanan</h5>
                <p class="card-text">
                    Pesan layanan pembuatan CV sesuai kebutuhanmu.
                </p>
                <a href="#" class="btn btn-primary">
                    Buat Pesanan
                </a>
            </div>
        </div>
    </div>

    {{-- Order History --}}
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pesanan Saya</h5>
                <p class="card-text">
                    Lihat status dan riwayat pesanan CV kamu.
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
