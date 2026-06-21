<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [

        'nomor_pendaftaran',
        'user_id',
        'nik',
        'nisn',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'nama_ayah',
        'nama_ibu',
        'no_hp',
        'asal_sekolah',
        'jalur',
        'status',
        'latitude',
        'longitude',
        'status_verifikasi',
        'nilai_rapor',
        'poin_sertifikat',
        'nilai_prestasi',
        'status_seleksi',
        'school_id',
        'jarak_zonasi',
        'latitude',
        'longitude',
        'nilai_rapor',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'nik'       => 'encrypted',
        'nisn'      => 'encrypted',
        'alamat'    => 'encrypted',
        'nama_ayah' => 'encrypted',
        'nama_ibu'  => 'encrypted',
        'no_hp'     => 'encrypted',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function document()
    {
        return $this->hasOne(Document::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
}
