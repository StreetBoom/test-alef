<?php
declare(strict_types=1);
namespace App\Services;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;

interface ClassroomServiceInterface
{

    public function getAll(): Collection;

    public function create(array $data): Classroom;

    public function update(array $data, Classroom $classroom): void;

    public function delete(Classroom $classroom):void;

    public function getLectures(Classroom $classroom): Collection;
}
