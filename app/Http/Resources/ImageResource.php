<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "url_xs" => $this->url_xs,
            "url_sm" => $this->url_sm,
            "url_md" => $this->url_md,
            "url_lg" => $this->url_lg,
            "url_xl" => $this->url_xl,
            "meta_data" => json_decode($this->meta_data, true),
        ];
    }
}
