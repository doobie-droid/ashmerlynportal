<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Average extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'year_id',
        'arm_id',
        'mean',
        'entry_year',
        'term'
    ];

    public function setMeanAttribute($value){
        if ($value){
            $this->attributes['mean'] = $value;
        }else{
            $this->attributes['mean'] = rand(20,90);
        }

    }

    public function year(){
        return $this->belongsTo(Year::class);
    }

}
