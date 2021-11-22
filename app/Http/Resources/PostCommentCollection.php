<?php

namespace App\Http\Resources;

use App\Models\PostComment;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCommentCollection extends ResourceCollection
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
            "data" => $this->collection,
            "meta" => [
                "total" => PostComment::where('post_id', $request->post)->count()
            ],
        ];
    }
}
