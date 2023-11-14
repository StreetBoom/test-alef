<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowStudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'email' => $this->resource->email,
            'wasListenedLectures'=>  $this->resource->classroom->curriculum->lectures->where('was_listened', 1),
            'classroom' => ClassroomResource::make($this->resource->classroom),

        ];
    }
}
