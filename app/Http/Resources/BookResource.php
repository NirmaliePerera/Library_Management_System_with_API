<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            'title' => $this->title,
            'author' => $this->author,
            'published_date' => $this->published_date,
            'genre' => $this->genre,
            'availability_status' => $this->availability_status,
        ];
    }
}
