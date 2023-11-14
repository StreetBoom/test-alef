<?php

namespace App\Rules;

use App\Models\Curriculum;
use App\Models\Lecture;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniquePriorityRule implements ValidationRule
{
    protected int $priority;
    protected int $lecture_id;

    public function __construct(int $priority, int $lecture_id)
    {
        $this->priority = $priority;
        $this->lecture_id = $lecture_id;
    }

    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $lecture = Lecture::find($this->lecture_id);
        if ($lecture->curriculums->where('priority', $this->priority)->count()) {
            $fail('The :attribute must be unique.');
        }
    }
}
