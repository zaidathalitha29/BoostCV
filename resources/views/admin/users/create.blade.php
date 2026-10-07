@extends('layouts.app')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="mb-4">

        <h1>Tambah User</h1>

        <p class="text-muted">
            Tambahkan pengguna baru ke dalam sistem BoostCV.
        </p>

    </div>


    {{-- Form --}}
    <div class="card">

        <div class="card-header">
            <strong>Form Tambah User</strong>
        </div>

        <div class="card-body">

            @if($errors->any())

                <div class="alert alert-danger">

                    <strong>Terjadi kesalahan:</strong>

                    <ul class="mb-0 mt-2">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form action="{{ route('admin.users.store') }}"
                  method="POST">

                @csrf


                {{-- Nama --}}
                <div class="form-group">

                    <label for="name">
                        Nama
                    </label>

                    <input type="text"
                           id="name"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}"
                           placeholder="Masukkan nama user"
                           required>

                    @error('name')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Email --}}
                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <input type="email"
                           id="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}"
                           placeholder="Masukkan email user"
                           required>

                    @error('email')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Role --}}
                <div class="form-group">

                    <label for="role">
                        Role
                    </label>

                    <select id="role"
                            name="role"
                            class="form-control @error('role') is-invalid @enderror"
                            required>

                        <option value="">
                            -- Pilih Role --
                        </option>

                        <option value="admin"
                            {{ old('role') == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                        <option value="creator"
                            {{ old('role') == 'creator' ? 'selected' : '' }}>
                            Creator
                        </option>

                        <option value="customer"
                            {{ old('role') == 'customer' ? 'selected' : '' }}>
                            Customer
                        </option>

                    </select>

                    @error('role')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Password --}}
                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input type="password"
                           id="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Minimal 8 karakter"
                           required>

                    @error('password')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Konfirmasi Password --}}
                <div class="form-group">

                    <label for="password_confirmation">
                        Konfirmasi Password
                    </label>

                    <input type="password"
                           id="password_confirmation"
                           name="password_confirmation"
                           class="form-control"
                           placeholder="Ulangi password"
                           required>

                </div>


                {{-- Button --}}
                <div class="mt-4">

                    <a href="{{ route('admin.users.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        Simpan User
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection