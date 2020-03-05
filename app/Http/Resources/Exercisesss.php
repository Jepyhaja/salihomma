<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Exercise extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'media_url' => $this->media_url,
            'is_beginner_friendly' => $this->is_beginner_friendly,
            'is_cardio' => $this->is_cardio,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
