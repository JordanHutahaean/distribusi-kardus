<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('distribusis', function (Blueprint $table) {

            $table->id();

            $table->integer('target_barang');

            $table->integer('kapasitas_a');
            $table->integer('kapasitas_b');
            $table->integer('kapasitas_c');

            $table->integer('rasio_a');
            $table->integer('rasio_b');
            $table->integer('rasio_c');

            $table->integer('jumlah_a');
            $table->integer('jumlah_b');
            $table->integer('jumlah_c');

            $table->integer('total_distribusi');

            $table->integer('selisih');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('distribusis');
    }
};