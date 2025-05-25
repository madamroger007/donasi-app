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
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug');
            $table->string('keterangan');
            $table->date('tanggal_kegiatan');
            $table->string('nama_donatur')->nullable();
            $table->string('jenis_kegiatan');
            $table->string('sumber_donasi');
            $table->string('bentuk_donasi');
            $table->string('masuk_donasi')->nullable();
            $table->string('keluar_donasi')->nullable();
            $table->string('jumlah');
            $table->string('penanggung_jawab')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};
