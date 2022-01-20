<?php

namespace App\Http\Resources;

class FilmResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'director' => $this->director,
            'rating' => $this->rating,
            'actors' => ActorResource::collection($this->whenLoaded('actors')),
            'created_at' => $this->prepareDateTime($this->created_at),
            'updated_at' => $this->prepareDateTime($this->updated_at),
        ];
    }
}
