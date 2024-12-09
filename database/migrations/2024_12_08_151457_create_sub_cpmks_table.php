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
        Schema::create('sub_cpmks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rps_id')->constrained('rps')->cascadeOnDelete();
            $table->integer('minggu_ke');
            $table->text('sub_cpmk');
            $table->text('materi_pembelajaran');
            $table->text('metode_pembelajaran');
            $table->text('assessment_indikator');
            $table->text('assessment_bentuk');
            $table->decimal('assessment_bobot', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_cpmks');
    }
};
