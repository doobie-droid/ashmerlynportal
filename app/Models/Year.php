<?php

namespace App\Models;

use      Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];


    public function subjects()
    {
        return $this->belongsToMany(Subject::class)->withPivot('user_id')->withTimestamps();;
    }

    public function arms()
    {
        return $this->belongsToMany(Arm::class)->withPivot('user_id')->withTimestamps();
    }

    public function subjectTeacher()
    {
        return $this->belongsToMany(Subject::class)
            ->wherePivot('user_id', auth()->user()->id);
    }

    public function users()
    {
        return $this->hasMany(User::class)->where('status', 1);
    }

    public function currentTermYearAverage()
    {
        $details = Detail::find(1);
        return $this->hasMany(Average::class)
            ->where('entry_year', $details->entry_year)
            ->orderBy('mean', 'desc');
    }

    public function currentTermArmAverage()
    {
        $details = Detail::find(1);
        return $this->hasMany(Average::class)
            ->where('entry_year', $details->entry_year)
            ->where('arm_id', auth()->user()->arm_id)
            ->orderBy('mean', 'desc');
    }

    public function currentTermYearPosition()
    {
        $mean_collection = $this->currentTermYearAverage()->get();
        $counter = 0;
        foreach ($mean_collection as $single_user_average) {
            $counter += 1;
            if ($single_user_average->user_id == auth()->user()->id) {
                return $counter.'/'.count($mean_collection);
            }
        }
        return "no match";
    }

    public function currentTermArmPosition()
    {
        $mean_collection = $this->currentTermArmAverage()->get();
        $counter = 0;
        foreach ($mean_collection as $single_user_average) {
            $counter += 1;
            if ($single_user_average->user_id == auth()->user()->id) {
                return $counter.'/'.count($mean_collection);
            }
        }
        return "no match";
    }


}
