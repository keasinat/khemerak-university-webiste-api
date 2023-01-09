<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
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
            'thumbnail' => $this->thumbnail,
            'file' => $this->file,
            'title_km' => $this->title_km,
            'category_name' => $this->dcategory->title_km,
            'created_at' => $this->created_at->format('Y-m-d'),
        ];
    }
}
