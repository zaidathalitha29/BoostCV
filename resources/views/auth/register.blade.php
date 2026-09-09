@extends('layouts.app')

@section('content')
<style>
    :root {
        --ink: #1C2434;
        --ink-soft: #4B5468;
        --paper: #FBFAF7;
        --paper-raised: #FFFFFF;
        --line: #E4E1D8;
        --navy: #223A66;
        --navy-deep: #16264A;
        --gold: #C98A2C;
        --gold-soft: #F3E2C2;
    }

    .auth-wrap {
        background: var(--paper);
        padding: 64px 0;
    }

    .auth-card {
        background: var(--paper-raised);
        border: 1px solid var(--line);
        border-radius: 12px;
        box-shadow: 0 24px 48px -28px rgba(22, 38, 74, 0.25);
        overflow: hidden;
    }

    .auth-card-head {
        padding: 34px 40px 28px;
        border-bottom: 1px solid var(--line);
        text-align: center;
    }

    .auth-brand {
        font-family: 'Fraunces', serif;
        font-size: 22px;
        font-weight: 600;
        color: var(--ink);
        text-decoration: none;
    }

    .auth-brand span { color: var(--navy); }

    .auth-card-head h1 {
        font-family: 'Fraunces', serif;
        font-size: 26px;
        font-weight: 600;
        color: var(--ink);
        margin: 16px 0 6px;
    }

    .auth-card-head p {
        color: var(--ink-soft);
        font-size: 14.5px;
        margin-bottom: 0;
    }

    .auth-card-body { padding: 36px 40px 40px; }

    .auth-field { margin-bottom: 22px; }

    .auth-field label {
        display: block;
        font-size: 13.5px;
        font-weight: 600;
        color: var(--ink);
        margin-bottom: 8px;
    }

    .auth-field .form-control {
        border: 1px solid var(--line);
        border-radius: 8px;
        padding: 11px 14px;
        font-size: 15px;
        height: auto;
        background: var(--paper);
        color: var(--ink);
    }

    .auth-field .form-control:focus {
        border-color: var(--navy);
        box-shadow: 0 0 0 3px rgba(34, 58, 102, 0.12);
        background: #fff;
    }

    .auth-field .form-control.is-invalid {
        border-color: #C1503E;
        background-image: none;
    }

    .auth-field .invalid-feedback {
        font-size: 13px;
        margin-top: 6px;
    }

    .auth-submit {
        background: var(--navy);
        border-color: var(--navy);
        border-radius: 8px;
        font-weight: 600;
        font-size: 15px;
        padding: 12px 0;
        width: 100%;
    }

    .auth-submit:hover {
        background: var(--navy-deep);
        border-color: var(--navy-deep);
    }

    .auth-footnote {
        text-align: center;
        margin-top: 26px;
        font-size: 14px;
        color: var(--ink-soft);
    }

    .auth-footnote a {
        color: var(--navy);
        font-weight: 600;
        text-decoration: none;
    }

    .auth-footnote a:hover { color: var(--navy-deep); }
</style>

<div class="auth-wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="auth-card">
                    <div class="auth-card-head">
                        <a href="{{ url('/') }}" class="auth-brand">Boost<span>CV</span></a>
                        <h1>{{ __('Buat akun baru') }}</h1>
                        <p>{{ __('Mulai langkah pertama menuju CV yang lebih baik.') }}</p>
                    </div>

                    <div class="auth-card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="auth-field">
                                <label for="name">{{ __('Nama Lengkap') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="auth-field">
                                <label for="email">{{ __('Alamat Email') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="auth-field">
                                <label for="password">{{ __('Kata Sandi') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="auth-field mb-4">
                                <label for="password-confirm">{{ __('Konfirmasi Kata Sandi') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <button type="submit" class="btn btn-primary auth-submit">
                                {{ __('Daftar Sekarang') }}
                            </button>
                        </form>

                        <p class="auth-footnote">
                            {{ __('Sudah punya akun?') }}
                            <a href="{{ route('login') }}">{{ __('Masuk di sini') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection