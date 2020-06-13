<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 20; $i++){
            DB::table('exercise_details')->insert([
                'name' => Str::random(10),
                'description' => Str::random(55),
                'media_url' => 'https://'.Str::random(10).'.com',
                'is_beginner_friendly' => rand(0,1),
                'is_cardio' => rand(0,1),
            ]);
        }
    }
}
