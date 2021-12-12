<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'simple_post' => new SimplePostResource($this->whenLoaded('simple_post')),
            //"my_reaction" => $this->my_reaction,
            //"reactions_count" => $this->when($this->reactions_count, $this->reactions_count),
            "created_at" => strtotime($this->created_at),
            "user" => new UserResource($this->whenLoaded('user')),
            /*
            reactions_count : 34,
            myReaction: {}
            */
        ];
    }
}
