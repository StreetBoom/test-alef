<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lecture extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function curriculums(): BelongsToMany
    {
        return $this->belongsToMany(Curriculum::class)->withPivot('priority');
    }

}
