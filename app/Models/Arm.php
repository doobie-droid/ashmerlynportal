<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arm extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'rank'
    ];

    public function years(){
        return $this->belongsToMany(Year::class)->withPivot('user_id')->withTimestamps();
    }
}
