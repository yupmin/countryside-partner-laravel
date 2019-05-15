<?php


namespace App\Services;
use Storage;

abstract class FileUpload implements FileUploadFactory
{

    private $extensions = [
        'jpg', 'jpeg', 'png'
    ];

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

    abstract function upload(object $file);

}
