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

    public function years(){
        return $this->belongsToMany(Year::class)->withPivot('user_id')->withTimestamps();
    }
}
