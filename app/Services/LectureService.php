<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Lecture;
use Illuminate\Support\Collection;

class LectureService implements LectureServiceInterface
{
    public function getAll(): Collection
    {
        return Lecture::all();
    }

    public function create(array $data): Lecture
    {
        return Lecture::create($data);
    }

    public function update(array $data, Lecture $lecture): void
    {
        $lecture->update($data);

    }

    public function delete(Lecture $lecture): void
    {
        $lecture->delete();
    }

    public function getWasListenedClassrooms(Lecture $lecture): Collection
    {
        $curriculums = $lecture->curriculums->where('was_listened', 1)->load('classrooms');
        $classrooms = collect();
        foreach ($curriculums as $curriculum) {
            $classrooms->merge($curriculum->classrooms);
        }

       return $classrooms;
    }
    public function getWasListenedStudents(Lecture $lecture): Collection
    {
        $curriculums = $lecture->curriculums->where('was_listened', 1)->load('classrooms.students');
        $students = collect();
        foreach ($curriculums as $curriculum) {
            $classrooms=$curriculum->classrooms;
            foreach ($classrooms as $classroom) {
                $students->merge($classroom->students);
            }
        }
        return $students;
    }
}
