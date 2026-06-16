<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {

            $table->string('nomor_pendaftaran')
                  ->unique()
                  ->nullable()
                  ->after('id');

        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {

            $table->dropColumn('nomor_pendaftaran');

        });
    }
};