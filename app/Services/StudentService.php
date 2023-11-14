<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;

class StudentService implements StudentServiceInterface
{
    public function getAll(): Collection
    {
        return Student::all();
    }

    public function create(array $data): Student
    {
        return Student::create($data);
    }

    public function update(array $data, Student $student): void
    {
        $student->update($data);

    }

    public function delete(Student $student): void
    {
        $student->delete();
    }

}
