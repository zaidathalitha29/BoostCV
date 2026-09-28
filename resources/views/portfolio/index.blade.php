@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
               Data Portofolio 
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
                            <th>Creator</th>
                            <th>Judul Portofolio</th>
                            <th>Gambar Portofolio</th>
                            <th>
                                <a href="{{ route('portfolio.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Portofolio</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($portfolios as $portfolio)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $portfolio->creator->user->name }}</td>
                            <td>{{ $portfolio->title }}</td>
                            <td>
                                @if($portfolio->image)
                                    <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" width="100">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('portfolio.destroy', $portfolio->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus portofolio ini?')"><i class="fas fa-trash"></i> Hapus</button>
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