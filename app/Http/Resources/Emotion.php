<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Emotion extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
        return [
//            'emotion_text' => $this->emotion_title,
            'emotion_title' => $this->emotion_text,
//            'created_at' => jdate($this->created_at)->format('datetime'),
//            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
