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
        Schema::create('students', function (Blueprint $table) {
           $table->id();

    $table->foreignId('user_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->string('nama_lengkap');

    $table->text('nik');
    $table->text('nisn');

    $table->string('tempat_lahir');
    $table->date('tanggal_lahir');

    $table->enum('jenis_kelamin',['L','P']);

    $table->text('alamat');

    $table->decimal('latitude',10,8)->nullable();
    $table->decimal('longitude',11,8)->nullable();

    $table->string('asal_sekolah');

    $table->text('nama_ayah');
    $table->text('nama_ibu');

    $table->text('no_hp');

    $table->enum('jalur',[
        'zonasi',
        'prestasi'
    ]);

    $table->enum('status_verifikasi',[
        'pending',
        'verified',
        'rejected'
    ])->default('pending');

    $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
