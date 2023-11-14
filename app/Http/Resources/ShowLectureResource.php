<?php

namespace App\Http\Resources;

use App\Services\LectureServiceInterface;
use App\Services\StudentServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowLectureResource extends JsonResource
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
            'priority' => $this->resource->curriculums->pivot->priority,
            'wasListenedClassrooms' => app(LectureServiceInterface::class)->getWasListenedClassrooms($this->resource),
            'wasListenedStudents' => app(LectureServiceInterface::class)->getWasListenedStudents($this->resource),

        ];
    }
}
