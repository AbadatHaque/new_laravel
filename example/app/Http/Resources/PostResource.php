<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // if i want as it is  -parent::toArray($request);
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'auther'=> new UserResource($this->auther)
        ];
    }
}
