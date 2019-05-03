<?php


namespace App\Services;


interface FileUploadFactory
{

    public function uploadToStorage(string $path, object $file); // 업로드
    public function arrowExtension(string $extension); // 파일 확장자 체크

}