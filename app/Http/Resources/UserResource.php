<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            'image' => new ImageResource($this->whenLoaded('image')),
            "username" => $this->username,
            "url" => "/@$this->username",
            "rol" => $this->whenLoaded('role', $this->role->name),
            "my_follow" => $this->whenLoaded('myFollow'),
            "created_at" => $this->when($request->user()->isAdmin(), strtotime($this->created_at)),
            'pets_count' => $this->when(isset($this->pets_count), $this->pets_count),

        ];
    }
}
