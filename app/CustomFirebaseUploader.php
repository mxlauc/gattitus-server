<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class CustomFirebaseUploader{

    private $bucket = null;

    public function __construct()
    {
        $this->bucket = app('firebase.storage')->getBucket();
    }

    public function upload($path){
        $result = [];

        $directory = 'gattitus/' . Auth::user()->facebook_id . '/' . 'imgs' . '/' . dechex(round(microtime(true) * 1000)) . "_" . Uuid::uuid4()->toString();
        $name = $directory . "/{SIZE}.jpg";
        $result['directory'] = $directory;

        $customImageModifier = new CustomImageModifier($path);
        
        $fileStream = $customImageModifier->getImageXL();
        $result['url_xl'] = $this->uploadFileFirebase(str_replace('{SIZE}', 'xl', $name), $fileStream);

        $fileStream = $customImageModifier->getImageLG();
        $result['url_lg'] = $this->uploadFileFirebase(str_replace('{SIZE}', 'lg', $name), $fileStream);

        $fileStream = $customImageModifier->getImageMD();
        $result['url_md'] = $this->uploadFileFirebase(str_replace('{SIZE}', 'md', $name), $fileStream);

        $fileStream = $customImageModifier->getImageSM();
        $result['url_sm'] = $this->uploadFileFirebase(str_replace('{SIZE}', 'sm', $name), $fileStream);

        $fileStream = $customImageModifier->getImageXS();
        $result['url_xs'] = $this->uploadFileFirebase(str_replace('{SIZE}', 'xs', $name), $fileStream);

        return $result;
    }

    private function uploadFileFirebase($name, $fileStream){
        $uuid = Uuid::uuid4()->toString();
    
        $this->bucket->upload($fileStream, [
            'name' => $name,
            'metadata' => [
                'metadata' => [
                    'firebaseStorageDownloadTokens' => $uuid
                ]
            ]
        ]);
        $name_formated = str_replace('/', '%2F', $name);
        return "https://firebasestorage.googleapis.com/v0/b/{$this->bucket->name()}/o/{$name_formated}?alt=media&token={$uuid}";
    }
}