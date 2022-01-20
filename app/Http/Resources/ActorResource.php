<?php

namespace App\Http\Resources;

class ActorResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'age' => $this->age,
            'films' => FilmResource::collection($this->whenLoaded('films')),
            'created_at' => $this->prepareDateTime($this->created_at),
            'updated_at' => $this->prepareDateTime($this->updated_at),
        ];
    }
}
