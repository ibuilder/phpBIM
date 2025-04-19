<?php

namespace App\Services;

use Supabase\Client;

class StorageService
{
    private $supabase;

    public function __construct(Client $supabase)
    {
        $this->supabase = $supabase;
    }

    public function uploadFile($filePath, $bucketName)
    {
        $file = fopen($filePath, 'r');
        $fileName = basename($filePath);
        
        $response = $this->supabase->storage->from($bucketName)->upload($fileName, $file);
        
        fclose($file);
        
        return $response;
    }

    public function getFileUrl($fileName, $bucketName)
    {
        return $this->supabase->storage->from($bucketName)->getPublicUrl($fileName);
    }

    public function deleteFile($fileName, $bucketName)
    {
        return $this->supabase->storage->from($bucketName)->remove([$fileName]);
    }
}