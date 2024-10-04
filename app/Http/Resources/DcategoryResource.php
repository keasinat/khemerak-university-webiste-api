<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DcategoryResource extends JsonResource
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
            'title_en' => $this->title_en,
            'created_at' => $this->created_at->format('Y-m-d')
        ];
    }
}
