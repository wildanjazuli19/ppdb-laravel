<?php

namespace App\Services;

class RSAService
{
    protected $publicKey;
    protected $privateKey;

    public function __construct()
    {
        $this->publicKey = file_get_contents(
            storage_path('app/keys/public.pem')
        );

        $this->privateKey = file_get_contents(
            storage_path('app/keys/private.pem')
        );
    }

    public function encrypt($data)
    {
        openssl_public_encrypt(
            $data,
            $encrypted,
            $this->publicKey
        );

        return base64_encode($encrypted);
    }

    public function decrypt($data)
    {
        openssl_private_decrypt(
            base64_decode($data),
            $decrypted,
            $this->privateKey
        );

        return $decrypted;
    }
}
