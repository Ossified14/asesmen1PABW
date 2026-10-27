<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prediksi_mikroklimat', function (Blueprint $table) {
            $table->id();
            $table->string('lokasi');
            $table->string('nama_tanaman');
            $table->float('suhu_udara');
            $table->integer('kelembapan_udara');
            $table->integer('kelembapan_tanah');
            $table->string('status_mikroklimat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prediksi_mikroklimat');
    }
};
