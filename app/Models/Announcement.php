<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'judul',
        'isi',
        'tanggal_publish',
        'status',
        'user_id'
    ];

    protected $casts = [
        'tanggal_publish' => 'date',
    ];
}
