<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    protected $fillable = [
        'target_barang',

        'kapasitas_a',
        'kapasitas_b',
        'kapasitas_c',

        'rasio_a',
        'rasio_b',
        'rasio_c',

        'jumlah_a',
        'jumlah_b',
        'jumlah_c',

        'total_distribusi',
        'selisih'
    ];
}