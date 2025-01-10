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
        Schema::create('donatur', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug');
            $table->string('no_telepon');
            $table->string('no_whatsapp');
            $table->string('alamat');
            $table->foreignId('tipe_donaturs_id')->constrained('tipe_donatur')->cascadeOnDelete()->nullable();
            $table->foreignId('status_keanggotaans_id')->constrained('status_keanggotaan')->cascadeOnDelete();
            $table->date('tanggal_lahir');
            $table->date('tanggal_gabung');
            $table->string('kota_lahir');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kode_pos');
            $table->string('provinsi');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donatur');
    }
};