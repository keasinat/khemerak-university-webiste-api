<?php

namespace App\Debc\Menu\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
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
            "slug" => $this->slug,
            "title_km"  => $this->title_km,
            "title_en" => $this->title_en,
            "is_single_page" => $this->is_single_page ?? 0,
            "sub_menu" => self::collection($this->whenLoaded('children'))
        ];
    }
}

