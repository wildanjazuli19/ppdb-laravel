<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'nama_sekolah',
        'alamat',
        'latitude',
        'longitude',
        'kuota'
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
