<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distribusi;

class DistribusiController extends Controller
{
    public function index()
    {
        return view('distribusi.index');
    }

    public function hitung(Request $request)
    {
        $target = $request->target_barang;

        $kapA = $request->kapasitas_a;
        $kapB = $request->kapasitas_b;
        $kapC = $request->kapasitas_c;

        $rasioA = $request->rasio_a;
        $rasioB = $request->rasio_b;
        $rasioC = $request->rasio_c;

        // Jalankan Python
        $command =
            "python " .
            base_path('python/distribusi.py') . " " .
            $target . " " .
            $kapA . " " .
            $kapB . " " .
            $kapC . " " .
            $rasioA . " " .
            $rasioB . " " .
            $rasioC;

        $output = shell_exec($command);

        $hasil = json_decode($output, true);

        if (!$hasil) {
            dd("Python Error", $output);
        }

        $jumlahA = $hasil['jumlahA'];
        $jumlahB = $hasil['jumlahB'];
        $jumlahC = $hasil['jumlahC'];

        $totalDistribusi = $hasil['totalDistribusi'];
        $selisih = $hasil['sisa'];

        $greedy = $hasil['greedy'];
        $branchAndBound = $hasil['branchAndBound'];

        // Simpan ke database
        Distribusi::create([
            'target_barang' => $target,

            'kapasitas_a' => $kapA,
            'kapasitas_b' => $kapB,
            'kapasitas_c' => $kapC,

            'rasio_a' => $rasioA,
            'rasio_b' => $rasioB,
            'rasio_c' => $rasioC,

            'jumlah_a' => $jumlahA,
            'jumlah_b' => $jumlahB,
            'jumlah_c' => $jumlahC,

            'total_distribusi' => $totalDistribusi,
            'selisih' => $selisih
        ]);

        return view('distribusi.hasil', compact(
            'jumlahA',
            'jumlahB',
            'jumlahC',
            'totalDistribusi',
            'selisih',
            'target',
            'greedy',
            'branchAndBound'
        ));
    }
}