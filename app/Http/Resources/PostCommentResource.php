<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\Cursor;
use Illuminate\Support\Facades\Auth;

class PostCommentResource extends JsonResource
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
            "description" => $this->description,
            "created_at" => strtotime($this->created_at),
            /* "myLike" => $this->when(Auth::user(), function(){
                return $this->myLike();
            }),
            "contador" => $this->contador(), */
            "gif_url" => $this->gif_url,
            "user" => new UserResource($this->whenLoaded('user')),
            'url' => route('posts.comments.index', $this->post_id) . '?cursor=' . (new Cursor(['id' => $this->id + 1], true))->encode(),
        ];
    }

}
