<?php

namespace App\Services;

use Illuminate\Support\Facades\Crypt;

class AesEncryptionService
{
    public static function encrypt($value)
    {
        return Crypt::encryptString($value);
    }

    public static function decrypt($value)
    {
        return Crypt::decryptString($value);
    }
}