@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                Edit Data Portofolio
            </div>
            <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="mb-3">
                        <label for="creator_id" class="form-label">Creator</label>
                        <select name="creator_id" class="form-control">
                            <option value="">Pilih Creator</option>
                            @foreach ($creators as $creator)
                                <option value="{{ $creator->id }}" {{ old('creator_id', $portfolio->creator_id) == $creator->id ? 'selected' : '' }}>
                                    {{ $creator->user->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('creator_id'))
                        <span class="text-danger">{{ $errors->first('creator_id') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Portofolio</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $portfolio->title) }}">
                        @error('title')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Portofolio</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                        @error('image')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="card-footer">
                    <a href="{{ route('portfolio.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection