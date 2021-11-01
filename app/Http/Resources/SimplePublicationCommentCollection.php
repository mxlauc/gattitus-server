<?php

namespace App\Http\Resources;

use App\Models\SimplePublicationComment;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SimplePublicationCommentCollection extends ResourceCollection
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
                "total" => SimplePublicationComment::where('simple_publication_id', $request->post)->count()
            ],
        ];
    }
}
