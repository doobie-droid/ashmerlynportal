<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function years()
    {
        return $this->belongsToMany(Year::class)->withPivot('user_id')->withTimestamps();
    }

    public function subjectscore()
    {
        return $this->hasMany(Score::class);
    }

    public function subjectYearAverageExam()
    {
        $details = Detail::find(1);
        return $this->hasMany(Score::class)
            ->where('term', $details->term)
            ->where('exam', '1')
            ->where('entry_year', $details->entry_year)
            ->where('year_id', auth()->user()->year_id)
            ->orderBy('score_total', 'desc');
    }

    public function subjectPositionYearExam()
    {
        $score_collection = $this->subjectYearAverageExam()->get();
        $counter = 0;
        foreach ($score_collection as $user_score) {
            $counter += 1;
            if ($user_score->user_id == auth()->user()->id) {
                return $counter.'/'.count($score_collection);
            }
        }
        return "no match";
    }

    public function subjectArmAverageExam()
    {
        $details = Detail::find(1);
        return $this->hasMany(Score::class)
            ->where('term', $details->term)
            ->where('exam', '1')
            ->where('entry_year', $details->entry_year)
            ->where('year_id', auth()->user()->year_id)
            ->where('arm_id',auth()->user()->arm_id)
            ->orderBy('score_total', 'desc');
    }

    public function subjectPositionArmExam()
    {
        $score_collection = $this->subjectArmAverageExam()->get();
        $counter = 0;
        foreach ($score_collection as $user_score) {
            $counter += 1;
            if ($user_score->user_id == auth()->user()->id) {
                return $counter.'/'.count($score_collection);
            }
        }
        return "no match";
    }
}
