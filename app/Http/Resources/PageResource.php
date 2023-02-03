<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
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
            'id' => $this->id,
            'slug' => $this->slug,
            'title_km' => $this->title_km,
            'content_km' => $this->content_km,
            'meta_description' => $this->meta_description ?? "",
            'meta_keyword' => $this->meta_keyword ?? "",
            'created_at' => $this->created_at->format('Y-m-d'),
        ];
    }
}

