<?php

namespace App\Services;

use App\Models\Curriculum;
use Illuminate\Database\Eloquent\Collection;

interface CurriculumServiceInterface
{
    public function getAll(): Collection;

    public function create(array $data): Curriculum;

    public function update(array $data, Curriculum $curriculum): void;

    public function delete(Curriculum $curriculum):void;
}
