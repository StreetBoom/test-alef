<?php

namespace App\Http\Requests;

use App\Rules\UniquePriorityRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CurriculumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|required',
            'classrooms' => 'array',
            'classrooms.*.lectures' => 'array',
            'classrooms.*.lectures.*' => 'array',
            'classrooms.*.lectures.*.id' => 'exists:lectures,id|required_with:classrooms.*.lectures.*',
            'classrooms.*.lectures.*.priority' => function ($attribute, $value, $fail) {
                $parts = explode('.', $attribute);
                $classroomIndex = $parts[1];
                $lectureIndex = $parts[3];

                $lectureId = $this->classrooms[$classroomIndex]['lectures'][$lectureIndex]['id'];
                $lecturePriority = $this->classrooms[$classroomIndex]['lectures'][$lectureIndex]['priority'];
                $rule = new UniquePriorityRule($lectureId, $lecturePriority);
                $rule->validate($attribute, $value, function () {

                });
            },
        ];
    }
}
