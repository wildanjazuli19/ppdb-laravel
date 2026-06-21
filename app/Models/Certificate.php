<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'student_id',
        'nama_prestasi',
        'tingkat',
        'peringkat',
        'file',
        'status_verifikasi',
        'poin',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
