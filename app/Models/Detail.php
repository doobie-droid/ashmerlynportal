<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;


    protected $fillable = [
        'exam',
        'term',
        'small_value',
        'large_value',
        'entry_year',
        'show_result',
        'show_all_result'

    ];

    public function getExamAttribute($value)
    {
        return +$value;

    }
    public function getTermAttribute($value)
    {
        return +$value;

    }
    public function getShowResultAttribute($value)
    {
        return +$value;

    }
    public function getShowAllResultAttribute($value)
    {
        return +$value;

    }
}
