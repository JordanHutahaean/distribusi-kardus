<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Distribusi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">
                    <h3>Hasil Perhitungan Distribusi Kardus</h3>
                </div>

                <div class="card-body">

                    <div class="alert alert-info">
                        <strong>Target Distribusi:</strong>
                        {{ number_format($target) }} Barang
                    </div>

                    <!-- Hasil Rasio -->
                    <h4 class="mb-3">Distribusi Berdasarkan Rasio</h4>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="card border-primary mb-3">
                                <div class="card-body text-center">
                                    <h5>Kardus A</h5>
                                    <h2>{{ $jumlahA }}</h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card border-success mb-3">
                                <div class="card-body text-center">
                                    <h5>Kardus B</h5>
                                    <h2>{{ $jumlahB }}</h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card border-warning mb-3">
                                <div class="card-body text-center">
                                    <h5>Kardus C</h5>
                                    <h2>{{ $jumlahC }}</h2>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Ringkasan -->
                    <table class="table table-bordered mt-3">
                        <thead class="table-dark">
                            <tr>
                                <th>Keterangan</th>
                                <th>Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total Distribusi</td>
                                <td>{{ number_format($totalDistribusi) }}</td>
                            </tr>

                            <tr>
                                <td>Sisa Distribusi</td>
                                <td>{{ number_format($selisih) }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- GREEDY -->
                    <div class="card border-danger mt-4">
                        <div class="card-header bg-danger text-white">
                            Hasil Metode Greedy
                        </div>

                        <div class="card-body">

                            <p>
                                <strong>Pilihan Kardus:</strong>
                                {{ implode(', ', $greedy['pilihan']) }}
                            </p>

                            <p>
                                <strong>Total Tambahan:</strong>
                                {{ $greedy['total'] }}
                            </p>

                            <p>
                                <strong>Kelebihan:</strong>
                                {{ $greedy['kelebihan'] }}
                            </p>

                        </div>
                    </div>

                    <!-- BRANCH AND BOUND -->
                    <div class="card border-success mt-4">
                        <div class="card-header bg-success text-white">
                            Hasil Metode Branch and Bound
                        </div>

                        <div class="card-body">

                            <p>
                                <strong>Kombinasi:</strong>
                                {{ implode(', ', $branchAndBound['kombinasi']) }}
                            </p>

                            <p>
                                <strong>Total Tambahan:</strong>
                                {{ $branchAndBound['total'] }}
                            </p>

                            <p>
                                <strong>Kelebihan:</strong>
                                {{ $branchAndBound['kelebihan'] }}
                            </p>

                        </div>
                    </div>

                    <!-- KESIMPULAN -->
                    <div class="alert alert-warning mt-4">

                        <h5>Kesimpulan</h5>

                        @if($branchAndBound['kelebihan'] < $greedy['kelebihan'])

                            <strong>Branch and Bound lebih optimal</strong>
                            karena menghasilkan kelebihan
                            {{ $branchAndBound['kelebihan'] }}
                            dibandingkan Greedy
                            {{ $greedy['kelebihan'] }}.

                        @elseif($branchAndBound['kelebihan'] > $greedy['kelebihan'])

                            <strong>Greedy lebih optimal</strong>
                            karena menghasilkan kelebihan
                            {{ $greedy['kelebihan'] }}
                            dibandingkan Branch and Bound
                            {{ $branchAndBound['kelebihan'] }}.

                        @else

                            Kedua metode menghasilkan nilai yang sama.

                        @endif

                    </div>

                    <div class="text-center mt-4">
                        <a href="/" class="btn btn-secondary">
                            Hitung Kembali
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

</body>
</html>