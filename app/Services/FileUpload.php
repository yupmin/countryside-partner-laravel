<?php


namespace App\Services;
use Storage;

class FileUpload
{
    public function profileUpload(string $file){

        $filePath = 'profiles/' . time().$file->getClientOriginalName();
        Storage::disk('ncloud')->put($filePath, file_get_contents($file));

        return $filePath;
    }

}
