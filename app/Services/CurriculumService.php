<?php

namespace App\Services;

use App\Models\Curriculum;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;

class CurriculumService implements CurriculumServiceInterface
{
    public function getAll(): Collection
    {
        return Curriculum::all();
    }

    public function create(array $data): Curriculum
    {
        return Curriculum::create($data);
    }

    public function update(array $data, Curriculum $curriculum): void
    {
        $curriculum->update($data);

    }

    public function delete(Curriculum $curriculum): void
    {
        $curriculum->delete();
    }
}
