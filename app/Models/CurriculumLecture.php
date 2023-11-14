<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CurriculumLecture extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'curriculum_lecture';

    public function lecture(): BelongsTo
    {
        return $this->belongsTo(Lecture::class);
    }
}
