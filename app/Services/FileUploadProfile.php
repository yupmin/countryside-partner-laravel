<?php


namespace App\Services;

class FileUploadProfile extends FileUpload
{

    const STORAGE_TYPE_PROFILE = "profiles";


    public function upload(object $file)
    {
        return $this->uploadToStorage(self::STORAGE_TYPE_PROFILE, $file);
    }
}
