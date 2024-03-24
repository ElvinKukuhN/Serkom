@extends('layouts.app')

@section('title')
    User List
@endsection
@section('content')
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title mb-4">Users</h5>
                <h6 class="card-subtitle mb-4">Manage your users here.</h6>

                <div class="mt-2">
                    @include('layouts.includes.messages')
                </div>

                <div class="d-flex justify-content-end mb-4">
                    <a href="{{ route('admin.create') }}" class="btn btn-primary btn-sm">Add User</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Usia</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswas as $mahasiswa)
                                <tr>
                                    <th scope="row">{{ $mahasiswa->id }}</th>
                                    <td>{{ $mahasiswa->nim }}</td>
                                    <td>{{ $mahasiswa->nama }}</td>
                                    <td>{{ $mahasiswa->alamat }}</td>
                                    <td>{{ $mahasiswa->tanggal_lahir }}</td>
                                    <td>{{ $mahasiswa->gender }}</td>
                                    <td>{{ $mahasiswa->usia }}</td>
                                    <td>
                                        <a href="{{ route('admin.show', $mahasiswa->nim) }}"
                                            class="btn btn-info btn-sm">Show</a>
                                        <a href="{{ route('admin.edit', $mahasiswa->nim) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('admin.delete', $mahasiswa->nim) }}" method="POST"
                                            style="display: inline-block;"
                                            onsubmit="return confirm('Are you sure you want to delete this mahasiswa?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
