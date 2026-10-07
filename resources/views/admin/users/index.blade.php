@extends('layouts.app')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1>Kelola Users</h1>
            <p class="text-muted mb-0">
                Mengelola seluruh pengguna BoostCV.
            </p>
        </div>

        <a href="{{ route('admin.users.create') }}"
           class="btn btn-primary">
            + Tambah User
        </a>
    </div>


    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    {{-- Error Message --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    {{-- Validation Errors --}}
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


    {{-- Table --}}
    <div class="card">

        <div class="card-header">
            <strong>Daftar Users</strong>
        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-bordered table-hover mb-0">

                    <thead class="thead-light">

                        <tr>
                            <th width="60">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Tanggal Dibuat</th>
                            <th width="180">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($users as $user)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $user->name }}
                                </td>

                                <td>
                                    {{ $user->email }}
                                </td>

                                <td>

                                    @if($user->role == 'admin')

                                        <span class="badge badge-danger">
                                            Admin
                                        </span>

                                    @elseif($user->role == 'creator')

                                        <span class="badge badge-primary">
                                            Creator
                                        </span>

                                    @else

                                        <span class="badge badge-success">
                                            Customer
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    {{ $user->created_at ? $user->created_at->format('d/m/Y') : '-' }}
                                </td>

                                <td>

                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>


                                    @if($user->id != auth()->id())

                                        <form action="{{ route('admin.users.destroy', $user->id) }}"
                                              method="POST"
                                              style="display: inline-block;">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Yakin ingin menghapus user ini?')">
                                                Hapus
                                            </button>

                                        </form>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="text-center py-4">

                                    Belum ada data user.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection