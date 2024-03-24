@extends('layouts.app')

@section('title')
    Mahasiswa List
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Daftar Mahasiswa</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" id="query" class="form-control" placeholder="Cari nama mahasiswa...">
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="mb-0">Total Mahasiswa: {{ $totalMahasiswa }}</p>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="mahasiswaTable">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Usia</th>
                            </tr>
                        </thead>
                        <tbody id="mahasiswa-list">
                            @foreach ($mahasiswas as $mahasiswa)
                                <tr>
                                    <th scope="row">{{ $mahasiswa->id }}</th>
                                    <td>{{ $mahasiswa->nim }}</td>
                                    <td>{{ $mahasiswa->nama }}</td>
                                    <td>{{ $mahasiswa->alamat }}</td>
                                    <td>{{ $mahasiswa->tanggal_lahir }}</td>
                                    <td>{{ $mahasiswa->gender }}</td>
                                    <td>{{ $mahasiswa->usia }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    <h5>Gender Statistics</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="genderChart" style="max-width: 300px;"></canvas>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                @foreach ($genderStatistics as $stat)
                                    <li>{{ $stat->gender }}: {{ $stat->total }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    {!! $mahasiswas->links() !!}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('genderChart').getContext('2d');
            var genderChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($genderStatistics->pluck('gender')) !!},
                    datasets: [{
                        label: 'Total',
                        data: {!! json_encode($genderStatistics->pluck('total')) !!},
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        });

        $(document).ready(function() {
            $('#query').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#mahasiswa-list tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
