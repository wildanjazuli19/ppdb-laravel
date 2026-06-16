<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {

            $table->id();

            $table->foreignId('student_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('kk')->nullable();

            $table->string('akta')->nullable();

            $table->string('rapor')->nullable();

            $table->string('surat_lulus')->nullable();

            $table->string('sertifikat')->nullable();

            $table->enum('status',[
                'pending',
                'verified',
                'rejected'
            ])->default('pending');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};