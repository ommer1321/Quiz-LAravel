<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Quiz;
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
    //    $this->call([
    //     UserSeeder::class,
    //     QuizSeeder::class,
    //     QuestionSeeder::class,
    //    ]);
        
  
      \App\Models\Quiz::factory(10)->create();
       \App\Models\User::factory(10)->create();
        \App\Models\Question::factory(100)->create();
         \App\Models\Answer::factory(1000)->create();
          \App\Models\Result::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User', 
        //     'email' => 'test@example.com',
        // ]);
    }
}
