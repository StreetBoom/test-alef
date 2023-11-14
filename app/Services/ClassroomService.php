<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Collection;

class ClassroomService implements ClassroomServiceInterface
{
    public function getAll(): Collection
    {
        return Classroom::all();
    }

    public function create(array $data): Classroom
    {
        return Classroom::create($data);
    }

    public function update(array $data, Classroom $classroom): void
    {
        $classroom->update($data);

    }

    public function delete(Classroom $classroom): void
    {
        $classroom->delete();
    }

    public function getLectures(Classroom $classroom): Collection
    {
        return $classroom->curriculum->lectures;
    }
}
