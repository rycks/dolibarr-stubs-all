<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Xls;

class RC4
{
    // Context
    protected $s = [];
    protected $i = 0;
    protected $j = 0;
    /**
     * RC4 stream decryption/encryption constrcutor.
     *
     * @param string $key Encryption key/passphrase
     */
    public function __construct($key)
    {
    }
    /**
     * Symmetric decryption/encryption function.
     *
     * @param string $data Data to encrypt/decrypt
     *
     * @return string
     */
    public function RC4($data)
    {
    }
}