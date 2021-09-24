<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\User::class,1)->create([
    		'email' => 'admin@admin.com',
    		'role' => '1'
    	]);
    	factory(App\User::class,1)->create([
    		'email' => 'instructor@admin.com',
    		'role' => '2'
    	]);   
        factory(App\User::class,4)->create([
            'role' => '2'
        ]);
    	factory(App\User::class,1)->create([
    		'email' => 'student@admin.com',
    		'role' => '3'
    	]);
        factory(App\Models\Quiz::class,20)->create([
            'image' => 'quiz_images/demo.png',
        ])->each(function($quiz){

            $count = rand(20,30);
            factory(App\Models\Question::class,$count)->create([
                'quiz_id' => $quiz->id,
            ])->each(function($quesiton){
                factory(App\Models\Answer::class)->create([
                    'is_correct' => true,
                    'question_id' => $quesiton->id
                ]);
                factory(App\Models\Answer::class,3)->create([
                    'is_correct' => false,
                    'question_id' => $quesiton->id
                ]);
            });
        }); 
        factory(App\Models\Quiz::class,10)->create([
            'image' => 'quiz_images/demo.png',
            'price' => 0
        ])->each(function($quiz){
            $count = rand(20,30);
            factory(App\Models\Question::class,$count)->create([
                'quiz_id' => $quiz->id,
            ])->each(function($quesiton){
                factory(App\Models\Answer::class)->create([
                    'is_correct' => true,
                    'question_id' => $quesiton->id
                ]);
                factory(App\Models\Answer::class,3)->create([
                    'is_correct' => false,
                    'question_id' => $quesiton->id
                ]);
            });
        });
    }
}
