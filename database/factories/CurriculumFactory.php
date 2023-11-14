<?php

namespace Database\Factories;

use App\Events\AddEndToCurriculumLecture;
use App\Models\Curriculum;
use App\Models\Lecture;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curriculum>
 */
class CurriculumFactory extends Factory
{
    public function configure()
    {

        return $this->afterCreating(function (Curriculum $curriculum) {

            for ($i = 0; $i < 5; $i++) {



                $existsLectures = $curriculum->lectures()->get()->pluck('id')->toArray();
                dump($existsLectures);
                           $priority = $curriculum->lectures()->count() + 1;
                $lectureWithThisPriority = Lecture::query()->select('id','curriculum_lecture.priority')
                    ->join('curriculum_lecture', 'lectures.id', '=', 'curriculum_lecture.lecture_id')
                    ->where('curriculum_lecture.priority', $priority)->get()->pluck('id')->toArray();

                $exceptionLectures = array_merge($existsLectures, $lectureWithThisPriority);

                $lecture = Lecture::query()->whereNotIn('id', $exceptionLectures)->inRandomOrder()->first();

                $wasListened = 0;
                if ($priority <= 2) {
                    $wasListened = 1;
                }

                $curriculum->lectures()->attach($lecture->id, [
                    'priority' => $priority,
                    'was_listened'=>$wasListened,
                ]);
            }
        });

    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->text(10),

        ];
    }
}
