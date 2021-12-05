<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

class PostResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "description" => $this->description,
            "image" => $this->image,
            "my_reaction" => $this->my_reaction,
            "reactions_count" => $this->when($this->reactions_count, $this->reactions_count),
            "created_at" => strtotime($this->created_at),
            "user_id" => $this->user_id // new UserResource($this->whenLoaded('user')),
        ];
    }

}
