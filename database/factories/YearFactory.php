<?php

namespace Database\Factories;

use App\Models\Arm;
use App\Models\Year;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Year>
 */
class YearFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $index = count(Year::all()) +1;
        $names= [0,7,8,9,10,11,12];
        $slugs = ['zero','seven','eight','nine','ten','eleven','twelve'];
        return [
            'name'=> $names[$index],
            'slug'=>Str::lower($slugs[$index]),
        ];
    }
}
