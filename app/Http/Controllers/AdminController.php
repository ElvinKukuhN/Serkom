<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Method untuk menampilkan semua data mahasiswa
    public function index()
    {
        // Mengambil semua data mahasiswa dari database dan diurutkan berdasarkan NIM secara descending
        $mahasiswas = Mahasiswa::orderBy('nim', 'desc')->get();

        // Mengirim data mahasiswa ke view 'admin.index'
        return view('admin.index', compact('mahasiswas'));
    }

    // Method untuk menampilkan detail mahasiswa berdasarkan NIM
    public function showByNim($nim)
    {
        // Mencari mahasiswa dengan NIM yang sesuai atau menghasilkan error jika tidak ditemukan
        $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();

        // Mengirim data mahasiswa ke view 'admin.show'
        return view('admin.show', compact('mahasiswa'));
    }

    // Method untuk menghapus mahasiswa berdasarkan NIM
    public function delete($nim)
    {
        // Mencari mahasiswa dengan NIM yang sesuai atau menghasilkan error jika tidak ditemukan
        $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();

        // Menghapus mahasiswa dari database
        $mahasiswa->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }

    // Method untuk menampilkan form edit mahasiswa
    public function edit($nim)
    {
        // Mencari mahasiswa dengan NIM yang sesuai atau menghasilkan error jika tidak ditemukan
        $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();

        // Mengirim data mahasiswa ke view 'admin.edit'
        return view('admin.edit', compact('mahasiswa'));
    }

    // Method untuk memperbarui data mahasiswa
    public function update(Request $request, $nim)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'usia' => 'required|numeric',
            'gender' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
        ]);

        // Mencari mahasiswa dengan NIM yang sesuai atau menghasilkan error jika tidak ditemukan
        $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();

        // Memperbarui data mahasiswa dengan data yang diterima dari request
        $mahasiswa->update([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'usia' => $request->input('usia'),
            'gender' => $request->input('gender'), // Sudah benar
            'tanggal_lahir' => $request->input('tanggal_lahir'),
        ]);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.index')->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    // Method untuk menyimpan data mahasiswa baru
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:255|unique:mahasiswas,nim',
            'alamat' => 'required|string|max:255',
            'usia' => 'required|numeric',
            'gender' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
        ]);

        // Membuat mahasiswa baru berdasarkan data yang diterima dari request
        Mahasiswa::create([
            'nama' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'alamat' => $request->input('alamat'),
            'usia' => $request->input('usia'),
            'gender' => $request->input('gender'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
        ]);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    // Method untuk menampilkan form untuk membuat mahasiswa baru
    public function create()
    {
        // Menampilkan view 'admin.create'
        return view('admin.create');
    }
}

