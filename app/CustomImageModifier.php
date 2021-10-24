<?php

namespace App;

use Intervention\Image\Facades\Image;

class CustomImageModifier{
    
    private $original_image = null;

    private $image_xl_size = 1000;
    private $image_lg_size = 500;
    private $image_md_size = 200;
    private $image_sm_size = 100;
    private $image_xs_size = 60;

    public function __construct($path)
    {
        $this->setImage($path);
    }

    public function getAspectRatio(){
        return round($this->original_image->width()/ $this->original_image->height(), 1);
    }

    public function getImageXL(){
        return $this->resizeImage($this->image_xl_size);
    }
    
    public function getImageLG(){
        return $this->resizeImage($this->image_lg_size);
    }
    
    public function getImageMD(){
        return $this->resizeImage($this->image_md_size);
    }
    
    public function getImageSM(){
        return $this->resizeImage($this->image_sm_size);
    }
    
    public function getImageXS(){
        return $this->resizeImage($this->image_xs_size);
    }
    
    public function getTwoColors(){
        $this->original_image->backup();

        $this->original_image->resize(90, 90);
        $this->original_image->pixelate(30);
        $this->original_image->brightness(20);
        $color1 = $this->original_image->pickColor(10, 80, 'hex');
        $color2 = $this->original_image->pickColor(80, 10, 'hex');

        $this->original_image->reset();

        return [
            'color_bl' => $color1,
            'color_tr' => $color2
        ];
    }

    private function setImage($path){
        $this->original_image = Image::make($path);
    }

    private function resizeImage($limit){
        $this->original_image->backup();

        if($limit == $this->image_md_size || $limit == $this->image_sm_size || $limit == $this->image_xs_size){
            $minSide = min($this->original_image->width(), $this->original_image->height());
            $this->original_image->crop($minSide, $minSide);
        }

        $this->original_image->resize($limit, $limit, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $stream = $this->getImageStream();

        $this->original_image->reset();

        return $stream;
    }

    private function getImageStream(){
        return $this->original_image->stream('jpg', 85);
    }
}