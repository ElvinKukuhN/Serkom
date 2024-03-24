@extends('layouts.app')

@section('title')
    Edit Mahasiswa
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card p-4 rounded shadow-sm">
            <h5 class="card-title mb-4">Update Mahasiswa</h5>

            <form method="post" action="{{ route('admin.update', $mahasiswa->nim) }}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input value="{{ $mahasiswa->nama }}" type="text" class="form-control" name="nama"
                        placeholder="Nama">
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input value="{{ $mahasiswa->nim }}" type="text" class="form-control" name="nim"
                        placeholder="NIM" readonly>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input value="{{ $mahasiswa->alamat }}" type="text" class="form-control" name="alamat"
                        placeholder="Alamat" required>
                    @error('alamat')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="usia" class="form-label">Usia</label>
                    <input value="{{ $mahasiswa->usia }}" type="text" class="form-control" name="usia"
                        placeholder="Usia" required>
                    @error('usia')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" name="gender" required>
                        <option value="">Pilih gender</option>
                        <option value="L" {{ $mahasiswa->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $mahasiswa->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('gender')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input value="{{ $mahasiswa->tanggal_lahir }}" type="date" class="form-control" name="tanggal_lahir"
                        placeholder="Tanggal Lahir" required>
                    @error('tanggal_lahir')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary me-md-2">Update Mahasiswa</button>
                    <a href="{{ route('admin.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
