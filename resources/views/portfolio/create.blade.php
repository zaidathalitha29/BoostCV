@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">Tambah Portofolio</div>
                <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="creator_id" class="form-label">Creator</label>
                        <select name="creator_id" class="form-control">
                            <option value="">Pilih Creator</option>
                            @foreach ($creators as $creator)
                                <option value="{{ $creator->id }}" {{ old('creator_id') == $creator->id ? 'selected' : '' }}>
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
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                        @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Portofolio</label>
                        <input type="file" name="image" class="form-control">
                        @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>

                <div class="card-footer">
                    <a href="{{route('portfolio.index')}}" class="btn btn-secondary btn-sm px-3"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection