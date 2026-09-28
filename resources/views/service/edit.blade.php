@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                Edit Data Services
            </div>
            <form action="{{ route('service.update', $service->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="mb-3">
                        <label for="creator_id" class="form-label">Creator</label>
                        <select name="creator_id" class="form-control">
                            <option value="">Pilih Creator</option>
                            @foreach ($creators as $creator)
                                <option value="{{ $creator->id }}" {{ old('creator_id', $service->creator_id) == $creator->id ? 'selected' : '' }}>
                                    {{ $creator->user->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('creator_id'))
                        <span class="text-danger">{{ $errors->first('creator_id') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Kategori</label>
                        <select name="category_id" class="form-control">
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $service->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Layanan</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $service->name) }}">
                        @error('name')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $service->description) }}">
                        @error('description')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="estimated_days" class="form-label">Estimasi Hari</label>
                        <input type="number" class="form-control @error('estimated_days') is-invalid @enderror" name="estimated_days" value="{{ old('estimated_days', $service->estimated_days) }}">
                        @error('estimated_days')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="">Pilih Status</option>
                            <option value="active" {{ old('status', $service->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status', $service->status) == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                        @if ($errors->has('status'))
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                        @endif
                    </div>

                </div>
                <div class="card-footer">
                    <a href="{{ route('service.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection