<?php


namespace App\Services;

use Storage;

class FileUploadService
{

    const STORAGE_TYPE_PROFILE = "profiles";
    const STORAGE_TYPE_CONTENTS = "contents";

    private $extensions = [
        'jpg', 'jpeg', 'png'
    ];

    /**
     * @param object $reqFile
     * @return string|null
     */
    public function profileUpload(object $reqFile = null)
    {
        if(!is_null($reqFile))
        {
            return $this->uploadToStorage(self::STORAGE_TYPE_PROFILE, $reqFile);
        }
    }

    public function contentsUpload(object $reqFile = null)
    {
        if(!is_null($reqFile))
        {

            return $this->uploadToStorage(self::STORAGE_TYPE_CONTENTS, $reqFile);
        }
    }

    public function uploadToStorage(string $path, object $file)
    {
        $filePath = null;

        if( $this->arrowExtension( $file->getClientOriginalExtension() )){

            $filePath = $path ."/". time().$file->getClientOriginalName();
            Storage::disk('ncloud')->put($filePath, file_get_contents($file));

        } else{

            $filePath = "File not allowed";
        }

        return $filePath;
    }

    public function arrowExtension(string $extension){

        return collect($this->extensions)->search(strtolower($extension));
    }
}
