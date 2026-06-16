<?php

namespace App\Services;

use App\Models\Student;

class RegistrationNumberService
{
    public static function generate()
    {
        $lastStudent = Student::latest('id')->first();

        $nextNumber = $lastStudent
            ? $lastStudent->id + 1
            : 1;

        return 'PPDB' .
            date('Y') .
            str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }
}