<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CatResource extends JsonResource
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
            'id' => $this->id,
            "name" => $this->name,
            "nickname" => $this->nickname,
            'slug' => $this->slug,
            'image' => new ImageResource($this->whenLoaded('image')),
            'user' => new ImageResource($this->whenLoaded('user')),
        ];
    }
}
