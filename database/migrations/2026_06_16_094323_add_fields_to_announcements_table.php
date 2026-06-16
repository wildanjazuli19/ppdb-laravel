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
        Schema::table('announcements', function (Blueprint $table) {
            $table->string('judul')->after('id');

            $table->text('isi')->after('judul');

            $table->date('tanggal_publish')
                ->nullable()
                ->after('isi');

            $table->enum('status', [
                'draft',
                'published',
            ])
                ->default('draft')
                ->after('tanggal_publish');

            $table->foreignId('user_id')
                ->nullable()
                ->after('status')
                ->constrained()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            //
        });
    }
};
