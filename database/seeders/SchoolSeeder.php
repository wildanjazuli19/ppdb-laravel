<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\School;

class SchoolSeeder extends Seeder
{
    public function run(): void
    {
        School::insert([

            [
                'nama_sekolah' => 'SMPN 16 Tangerang Selatan',
                'alamat' => 'Tangerang Selatan',
                'latitude' => -6.29500000,
                'longitude' => 106.71000000,
                'kuota_zonasi' => 180,
                'kuota_prestasi' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_sekolah' => 'SMPN 2 Tangerang Selatan',
                'alamat' => 'Tangerang Selatan',
                'latitude' => -6.30000000,
                'longitude' => 106.71500000,
                'kuota_zonasi' => 180,
                'kuota_prestasi' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_sekolah' => 'SMPN 11 Tangerang Selatan',
                'alamat' => 'Tangerang Selatan',
                'latitude' => -6.30500000,
                'longitude' => 106.72000000,
                'kuota_zonasi' => 180,
                'kuota_prestasi' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}