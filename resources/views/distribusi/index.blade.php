<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distribusi Kardus</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header text-center">
                    <h3>Sistem Distribusi Kardus</h3>
                </div>

                <div class="card-body">

                    <form action="{{ route('hitung') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">
                                Target Distribusi Barang
                            </label>
                            <input
                                type="number"
                                name="target_barang"
                                class="form-control"
                                required>
                        </div>

                        <h5 class="mt-4">Kapasitas Kardus</h5>

                        <div class="row">

                            <div class="col-md-4">
                                <label>Kardus A</label>
                                <input
                                    type="number"
                                    name="kapasitas_a"
                                    class="form-control"
                                    required>
                            </div>

                            <div class="col-md-4">
                                <label>Kardus B</label>
                                <input
                                    type="number"
                                    name="kapasitas_b"
                                    class="form-control"
                                    required>
                            </div>

                            <div class="col-md-4">
                                <label>Kardus C</label>
                                <input
                                    type="number"
                                    name="kapasitas_c"
                                    class="form-control"
                                    required>
                            </div>

                        </div>

                        <h5 class="mt-4">Rasio Distribusi</h5>

                        <div class="row">

                            <div class="col-md-4">
                                <label>Rasio A</label>
                                <input
                                    type="number"
                                    name="rasio_a"
                                    class="form-control"
                                    required>
                            </div>

                            <div class="col-md-4">
                                <label>Rasio B</label>
                                <input
                                    type="number"
                                    name="rasio_b"
                                    class="form-control"
                                    required>
                            </div>

                            <div class="col-md-4">
                                <label>Rasio C</label>
                                <input
                                    type="number"
                                    name="rasio_c"
                                    class="form-control"
                                    required>
                            </div>

                        </div>

                        <div class="mt-4">
                            <button
                                type="submit"
                                class="btn btn-primary w-100">
                                Hitung Distribusi
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>