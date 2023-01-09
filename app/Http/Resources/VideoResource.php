<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
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
            'title_km' => $this->title_km,
            'thumbnail' => $this->thumbnail,
            'file' => $this->file,
            'created_at' => $this->created_at->format('Y-m-d'),
        ];
    }
}
