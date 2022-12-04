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
        'arm_id',
        'subject_id',
        'exam',
        'score_1',
        'score_2',
        'score_3',
        'score_total',
        'entry_date',
        'term',
        'teacher_id'
    ];

    public function getScore1Attribute($value)
    {
        return number_format($value, 1);
    }

    public function getScore2Attribute($value)
    {
        return number_format($value, 1);
    }
    public function getScore3Attribute($value)
    {
        return number_format($value, 1);
    }
    public function getScoreTotalAttribute($value)
    {
        return number_format($value, 1);
    }


    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function teacher(){
        return $this->hasOne(User::class,'id','teacher_id');
    }

}
