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
        Schema::create('rps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mata_kuliah_id')->constrained()->cascadeOnDelete();
            $table->string('kode');
            $table->string('rumpun_mk');
            $table->integer('bobot_sks');
            $table->string('semester');
            $table->date('tanggal_penyusunan');
            $table->string('pengembang_rps');
            $table->string('koordinator_rmk');
            $table->string('ketua_prodi');
            $table->string('cpl_prodi_id');
            $table->text('cp_matakuliah');
            $table->text('deskripsi_mk');
            $table->text('pustaka_utama');
            $table->text('pustaka_pendukung');
            $table->text('media_perangkat_lunak');
            $table->text('media_perangkat_keras');
            $table->text('team_teaching');
            $table->text('matakuliah_syarat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rps');
    }
};
