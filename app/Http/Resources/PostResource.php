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
            "my_reaction" => $this->whenLoaded('myReaction'),
            "reactions_count" => $this->when(isset($this->reactions_count), $this->reactions_count),
            "comments_count" => $this->when(isset($this->comments_count), $this->comments_count),
            "created_at" => strtotime($this->created_at),
            "user" => new UserResource($this->whenLoaded('user')),
            "best_comments" => PostCommentResource::collection($this->whenLoaded('bestComments')),
            'best_comments_count' => $this->when(isset($this->best_comments_count), $this->best_comments_count),
            "reports" => ReportResource::collection($this->whenLoaded('reports')),
            'pets' => PetResource::collection($this->whenLoaded('pets')),
            'pets_count' => $this->pets_count ?? 0,
        ];
    }
}
