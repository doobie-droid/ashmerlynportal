<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Activity;
use App\Models\Arm;
use App\Models\Role;
use App\Models\Subject;
use App\Models\User;
use App\Models\Year;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Populating a many-to-many relationship on the database
        User::factory()->count(100)->create();

        $this->runRoleMigration();

        $roles = Role::where('id', '>', 1)->get();

        //Populate the pivot table
        User::where('id', '>', 1)->each(function ($user) use ($roles) {
            $user->roles()->attach(
                $roles->random(rand(1, 3))->pluck('id')->toArray()
            );
        });


        if (count(Activity::all()) < 10) {
            Activity::factory()->count(10)->create();
            $elements = [1, 2, 3, 4, 5, 6];
            //for some reason which I am yet to figure out, calling the factory 7 times make the factory repeat the
            //exact same action in the same state, so there are problems because most of the name fields must be unique
            foreach ($elements as $element) {
                Subject::factory()->count(1)->create();
                Arm::factory()->count(1)->create();
                Year::factory()->count(1)->create();
            }
            $subjects = Subject::all();
            $arms = Arm::all();
            //Populate the year subject pivot table
            //this gets a random number between 1 and 3 so if it gets 2, then it finds 2 subjects
            // and attaches it to a year
            Year::all()->each(function ($year) use ($subjects) {
                $year->subjects()->attach(
                    $subjects->random(rand(4, 6))->pluck('id')->toArray()
                );
            });
            //populate the year arm pivot table
            Year::all()->each(function ($year) use ($arms) {
                $year->arms()->attach(
                    $arms->random(rand(2, 5))->pluck('id')->toArray()
                );
            });
        }
    }

    public function runRoleMigration()
    {
        
        Role::insert([
            ['name' => 'administrator', 'slug' => 'administrator'],
            ['name' => 'parent', 'slug' => 'parent'],
            ['name' => 'teacher', 'slug' => 'teacher'],
            ['name' => 'student', 'slug' => 'student'],
        ]);
    }
}
