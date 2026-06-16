<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [

        'student_id',

        'kk',
        'akta',
        'rapor',
        'surat_lulus',
        'sertifikat',

        'status'

    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}