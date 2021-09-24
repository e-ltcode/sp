<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


use App\Models\Answer;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseFeedback;
use App\Models\Lesson;
use App\Models\LessonComment;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\QuizAttemptsQuestion;
use App\Models\Syllabus;
use App\Models\Tag;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
	$role = rand(1,3);
	return [
		'name' => $faker->name,
		'email' => $faker->unique()->safeEmail,
		'phone' => $faker->unique()->numerify('##########'),
		'image' => 'courses/300x400.png',
		'email_verified_at' => now(),
        'password' => Hash::make('123456'), // password
        'remember_token' => Str::random(10),
        'role' => $role
    ];
});


$factory->define(Course::class, function (Faker $faker) {
	$all_users = User::where('role',2)->get()->toArray();
	$count = count($all_users);
	$rand_user_index = rand(0,$count-1);
	$course_difficulity = config('constants.course_difficulity');

	return [
		'created_by' => $all_users[$rand_user_index]['id'],
		'course_name' => $faker->name,
		'instructor_name' => $faker->name,
		'price' => $faker->randomDigit,
		'featured_img' => 'courses/300x400.png',
		'video_type' => "Youtube",
		'video_url' => "https://www.youtube.com/watch?v=xcJtL7QggTI",
		'max_students' => $faker->randomDigit,
		'dificulty_level' => $course_difficulity[rand(0,2)],
		'course_duration' => $faker->randomDigit,
		'course_benefits' => $faker->sentence,
		'course_instructions' => $faker->sentence,
		'targeted_audience' => $faker->sentence,
		'materials_included' => $faker->sentence,
	];
});

$factory->define(Syllabus::class, function (Faker $faker) {
	$all_users = User::where('role',2)->get()->toArray();
	$count = count($all_users);
	$rand_user_index = rand(0,$count-1);

	return [
		'title' => $faker->name,
		'description' => $faker->sentence,
		'created_by' => $all_users[$rand_user_index]['id'],
	];
});


$factory->define(Lesson::class, function (Faker $faker) {
	$all_users = User::where('role',2)->get()->toArray();
	$count = count($all_users);
	$rand_user_index = rand(0,$count-1);
	return [
		'lesson_title' => $faker->name,
		'lesson_description' => $faker->sentence,
		'featured_img' => 'topics/300x400.png',
		'video_type' => "Youtube",
		'video_url' => "https://www.youtube.com/watch?v=xcJtL7QggTI",
		'created_by' => $all_users[$rand_user_index]['id'],
	];
});

$factory->define(Quiz::class, function (Faker $faker) {
	$all_users = User::where('role',2)->get()->toArray();
	$count = count($all_users);
	$price =rand(0,100);
	$rand_user_index = rand(0,$count-1);
	return [
		'quiz_title' => $faker->name,
		'quiz_description' => $faker->sentence,
		'price' => $price,
		'created_by' => $all_users[$rand_user_index]['id'],
	];
});


$factory->define(Question::class, function (Faker $faker) {
	$all_users = User::where('role',2)->get()->toArray();
	$count = count($all_users);
	$rand_user_index = rand(0,$count-1);
	return [
		'title' => $faker->sentence,
		'type' => 'mcqs',
		'answer_explaination' => $faker->text(250),
		'created_by' => $all_users[$rand_user_index]['id'],
	];
});

$factory->define(Answer::class, function (Faker $faker) {
	$all_users = User::where('role',2)->get()->toArray();
	$count = count($all_users);
	$rand_user_index = rand(0,$count-1);
	return [
		'title' => $faker->sentence,
		'is_correct' => rand(0,1),
		'created_by' => $all_users[$rand_user_index]['id'],
	];
});
