<?php

namespace Database\Factories;

use App\Models\Arm;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Arm>
 */
class ArmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //I used the faker values for jobs to replace the different arms

        $index = count(Arm::all());
        $arm_array = ['Faith','Joy','Peace','Love','Goodness','Kindness','Mercy','Temperance','Long Suffering'];
        return [
            'name'=>$arm_array[$index],
            'slug' => Str::of(Str::lower($arm_array[$index]))->slug('-'),
            //
        ];
    }
}
