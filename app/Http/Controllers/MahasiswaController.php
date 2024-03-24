<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    // Mengambil data mahasiswa dengan kemampuan pencarian
    public function userSearch(Request $request)
    {
        // Mengambil semua data mahasiswa secara default diurutkan berdasarkan NIM secara descending
        $mahasiswas = Mahasiswa::orderBy('nim', 'desc');

        // Menerapkan pencarian berdasarkan nama jika ada parameter pencarian yang diberikan
        if ($request->has('search')) {
            $mahasiswas->where('nama', 'like', '%' . $request->input('search') . '%');
        }

        // Melakukan paginasi untuk menampilkan 10 data mahasiswa per halaman
        $mahasiswas = $mahasiswas->paginate(10);

        // Menghitung total data mahasiswa
        $totalMahasiswa = Mahasiswa::count();

        // Mengambil statistik rekap jumlah mahasiswa berdasarkan gender
        $genderStatistics = Mahasiswa::select('gender', DB::raw('count(*) as total'))
            ->groupBy('gender')
            ->get();

        // Mengirim data mahasiswa, total mahasiswa, dan statistik gender ke view
        return view('mahasiswa.index', [
            'mahasiswas' => $mahasiswas,
            'totalMahasiswa' => $totalMahasiswa,
            'genderStatistics' => $genderStatistics,
        ]);
    }
}
