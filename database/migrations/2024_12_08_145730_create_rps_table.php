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
            // $table->foreignId('mata_kuliah_id')->constrained()->cascadeOnDelete();
            $table->string('nama_mk');
            $table->string('kode');
            $table->string('rumpun_mk');
            $table->integer('bobot_sks');
            $table->string('semester');
            $table->date('tanggal_penyusunan');
            $table->string('pengembang_rps');
            $table->string('koordinator_rmk');
            $table->string('ketua_prodi');
            $table->text('cpl_prodi_id');
            $table->text('cp_matakuliah');
            $table->text('deskripsi_mk');
            $table->text('pustaka_utama');
            $table->text('pustaka_pendukung');
            $table->text('media_perangkat_lunak');
            $table->text('media_perangkat_keras');
            $table->text('team_teaching');
            $table->text('matakuliah_syarat');
            //percobaan penambahan sub-cpmk agar tidak dipisah
            $table->integer('minggu_ke');
            $table->text('sub_cpmk');
            $table->text('materi_pembelajaran');
            $table->text('metode_pembelajaran');
            $table->text('assessment_indikator');
            $table->text('assessment_bentuk');
            $table->decimal('assessment_bobot', 5, 2);
            //end sub
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
