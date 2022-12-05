<?php

namespace Database\Factories;

use App\Models\Arm;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $index = count(Subject::all());
        $subject_array = ['Mathematics','Geography','Accounting','Economics','Further Mathematics','History','Agricultural Science','Christian Religious Studies','English Language','Chemistry','Physics','Home Economics','Biology','Fine Arts','Music'];
        return [
            'name'=>$subject_array[$index],
            'slug' => Str::of(Str::lower($subject_array[$index]))->slug('-'),

        ];
    }
}
