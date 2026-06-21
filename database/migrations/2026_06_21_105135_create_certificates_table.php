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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')
                ->constrained('students')
                ->onDelete('cascade');

            $table->string('nama_prestasi');
            $table->string('tingkat'); // contoh: sekolah, kecamatan, kabupaten, provinsi, nasional
            $table->string('peringkat')->nullable(); // contoh: juara 1, juara 2, harapan 1
            $table->string('file')->nullable(); // path file sertifikat
            $table->string('status_verifikasi')->default('pending'); // pending, verified, rejected
            $table->integer('poin')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
