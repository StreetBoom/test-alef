<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Lecture;
use Illuminate\Support\Collection;

interface LectureServiceInterface
{
    public function getAll(): Collection;

    public function create(array $data): Lecture;

    public function update(array $data, Lecture $lecture): void;

    public function delete(Lecture $lecture):void;

    public function getWasListenedClassrooms(Lecture $lecture): Collection;


    public function getWasListenedStudents(Lecture $lecture): Collection;

}
