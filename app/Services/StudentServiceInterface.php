<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;

interface StudentServiceInterface
{
    public function getAll(): Collection;

    public function create(array $data): Student;

    public function update(array $data, Student $student): void;

    public function delete(Student $student):void;
}
