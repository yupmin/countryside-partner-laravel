<?php


namespace App\Services;

class FileUploadProfile extends FileUpload
{


    const STORAGE_TYPE_PROFILE = "profiles";

    public function configurationPath(object $file)
    {
        $this->upload(self::STORAGE_TYPE_PROFILE, $file);
    }
}
