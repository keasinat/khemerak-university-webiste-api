<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) 
    {
        return [
            "id" => $this->id,
            "thumbnail" => $this->thumbnail ?? 'https://via.placeholder.com/350x167',
            "slug" => $this->slug,
            "title_km"  => $this->title_km,
            "description_km"  => $this->description_km,
            "content_km"  => $this->content_km,
            "meta_keyword"  => $this->meta_keyword,
            "meta_description"  => $this->meta_description,
            "date"  => $this->created_at->format('d-m-Y'),
        ];
    }
}
