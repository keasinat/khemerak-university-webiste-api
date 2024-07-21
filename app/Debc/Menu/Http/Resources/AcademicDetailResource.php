<?php

namespace App\Debc\Menu\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AcademicDetailResource extends JsonResource
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
            "thumbnail" => $this->thumbnail ?? '',
            "slug" => $this->slug,
            "title_km"  => $this->title_km,
            "title_en" => $this->title_en,
            "highlight_km" => $this->highlight_km,
            "highlight_en" => $this->highlight_en,
            "description_km"  => $this->description_km,
            "description_en"  => $this->description_en
        ];
    }
}

