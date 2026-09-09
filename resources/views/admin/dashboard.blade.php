@extends('layouts.app')

@section('content')

<div class="container-fluid">

<div class="mb-4">
    <h1>Dashboard Admin</h1>
    <p class="text-muted">
        Selamat datang, {{ Auth::user()->name }}!
    </p>
</div>

<div class="row">

    {{-- Users --}}
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Users</h5>
                <p class="card-text">
                    Mengelola data pengguna BoostCV.
                </p>
                <a href="#" class="btn btn-primary">
                    Kelola Users
                </a>
            </div>
        </div>
    </div>

    {{-- Categories --}}
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Categories</h5>
                <p class="card-text">
                    Mengelola kategori layanan CV.
                </p>
                <a href="#" class="btn btn-primary">
                    Kelola Categories
                </a>
            </div>
        </div>
    </div>

    {{-- Creators --}}
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Creators</h5>
                <p class="card-text">
                    Mengelola data creator BoostCV.
                </p>
                <a href="#" class="btn btn-primary">
                    Kelola Creators
                </a>
            </div>
        </div>
    </div>

    {{-- Services --}}
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Services</h5>
                <p class="card-text">
                    Mengelola layanan pembuatan CV.
                </p>
                <a href="#" class="btn btn-primary">
                    Kelola Services
                </a>
            </div>
        </div>
    </div>

    {{-- Orders --}}
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Orders</h5>
                <p class="card-text">
                    Melihat dan mengelola pesanan customer.
                </p>
                <a href="#" class="btn btn-primary">
                    Kelola Orders
                </a>
            </div>
        </div>
    </div>

    {{-- Payments --}}
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Payments</h5>
                <p class="card-text">
                    Memeriksa dan memverifikasi pembayaran.
                </p>
                <a href="#" class="btn btn-primary">
                    Kelola Payments
                </a>
            </div>
        </div>
    </div>

</div>

</div>

@endsection
