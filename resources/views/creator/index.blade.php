@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
               Data Creators 
            </div>
            <div class="card-body table-responsive">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <table id="table" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Bio</th>
                            <th>Nomor Telepon</th>
                            <th>Foto Profil</th>
                            <th>
                                <a href="{{ route('creator.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Creator</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($creators as $creator)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $creator->user->name }}</td>
                            <td>{{ $creator->bio }}</td>
                            <td>{{ $creator->phone }}</td>
                            <td>
                                @if($creator->profile_photo)
                                    <img src="{{ asset('storage/' . $creator->profile_photo) }}" alt="Profile Photo" class="img-thumbnail" style="max-width: 100px;">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('creator.edit', $creator->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('creator.destroy', $creator->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus creator ini?')"><i class="fas fa-trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection