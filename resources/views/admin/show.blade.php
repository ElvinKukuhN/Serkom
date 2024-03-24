@extends('layouts.app')

@section('title')
    Show Mahasiswa
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card p-4 shadow" style="background-color: #f8f9fa;">
            <h5 class="card-title mb-4 text-primary">Show Mahasiswa</h5>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nama" class="form-label text-secondary">Name:</label>
                        <p class="text-dark">{{ $mahasiswa->nama }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label text-secondary">NIM:</label>
                        <p class="text-dark">{{ $mahasiswa->nim }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label text-secondary">Alamat:</label>
                        <p class="text-dark">{{ $mahasiswa->alamat }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label text-secondary">Tanggal Lahir:</label>
                        <p class="text-dark">{{ $mahasiswa->tanggal_lahir }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label text-secondary">Gender:</label>
                        <p class="text-dark">{{ $mahasiswa->gender }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="usia" class="form-label text-secondary">Usia:</label>
                        <p class="text-dark">{{ $mahasiswa->usia }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
