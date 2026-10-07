@extends('layouts.app')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="mb-4">

        <h1>Edit User</h1>

        <p class="text-muted">
            Perbarui informasi pengguna BoostCV.
        </p>

    </div>


    {{-- Form --}}
    <div class="card">

        <div class="card-header">
            <strong>Form Edit User</strong>
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


            <form action="{{ route('admin.users.update', $user->id) }}"
                  method="POST">

                @csrf

                @method('PUT')


                {{-- Nama --}}
                <div class="form-group">

                    <label for="name">
                        Nama
                    </label>

                    <input type="text"
                           id="name"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $user->name) }}"
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
                           value="{{ old('email', $user->email) }}"
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

                        <option value="admin"
                            {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                        <option value="creator"
                            {{ old('role', $user->role) == 'creator' ? 'selected' : '' }}>
                            Creator
                        </option>

                        <option value="customer"
                            {{ old('role', $user->role) == 'customer' ? 'selected' : '' }}>
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
                        Password Baru
                    </label>

                    <input type="password"
                           id="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Kosongkan jika tidak ingin mengubah password">

                    <small class="form-text text-muted">
                        Kosongkan jika password tidak ingin diubah.
                    </small>

                    @error('password')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Konfirmasi Password --}}
                <div class="form-group">

                    <label for="password_confirmation">
                        Konfirmasi Password Baru
                    </label>

                    <input type="password"
                           id="password_confirmation"
                           name="password_confirmation"
                           class="form-control"
                           placeholder="Ulangi password baru">

                </div>


                {{-- Button --}}
                <div class="mt-4">

                    <a href="{{ route('admin.users.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection