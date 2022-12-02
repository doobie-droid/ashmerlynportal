<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'year_id',
        'subject_id',
        'exam',
        'score_1',
        'score_2',
        'score_3',
        'entry_date',
        'term',
        'teacher_id'
    ];
}
