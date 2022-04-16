<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "details" => $this->details,
            "created_at" => strtotime($this->created_at),
            "post" => new PostResource($this->whenLoaded('post')),
            "user" => new UserResource($this->whenLoaded('user')),
            "report_type" => new ReportTypeResource($this->whenLoaded('report_type')),
        ];
    }
}
