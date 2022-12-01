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

    public function subjectTeacher(){
        return $this->belongsToMany(Subject::class)
            ->wherePivot('user_id', auth()->user()->id);
    }

    public function students(){
        return $this->hasMany(User::class)->where('status',1);
    }




}
