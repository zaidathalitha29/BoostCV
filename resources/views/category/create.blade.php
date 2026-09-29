@extends('layouts.app')
@section('title', 'Tambah Category')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                Tambah Category
            </div>
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Nama Category
                        </label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name') }}"
                               placeholder="Masukkan nama category">
                        @if ($errors->has('name'))
                            <span class="text-danger">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">
                            Deskripsi
                        </label>
                        <textarea name="description"
                                  class="form-control"
                                  rows="4"
                                  placeholder="Masukkan deskripsi category">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">
                                {{ $errors->first('description') }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('category.index') }}"
                       class="btn btn-secondary btn-sm px-3">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                    <button type="submit"
                            class="btn btn-primary btn-sm">
                        <i class="fas fa-save"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

