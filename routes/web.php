<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
})->name('home');

Auth::routes();

// Route::get('/home', 'MarketplaceController@index')->name('home');

Route::prefix('admin')->middleware(['auth','admin_auth'])->group(function () {
	Route::get('/', 'Admin\\AdminController@index')->name('admin');
	Route::get('/dashboard', 'Admin\\AdminController@index')->name('dashboard');
	
	/* User Routes */
	Route::get('users'					             , 'Admin\\UserController@index')->name('users');
	Route::get('users/create'		                     , 'Admin\\UserController@create')->name('user_create');
	Route::post('users/create'			             , 'Admin\\UserController@create')->name('user_create');
	Route::get('users/edit/{id?}'		                 , 'Admin\\UserController@edit')->name('user_edit');
	Route::post('users/edit/{id?}'		             , 'Admin\\UserController@edit')->name('user_edit');
	Route::get('users/update/{id?}'	                 , 'Admin\\UserController@update')->name('user_update');
	Route::get('users/delete/{id}'		             , 'Admin\\UserController@delete')->name('user_delete');
	Route::post('update-profile'                       , 'Admin\\UserController@updateProfile')->name('update_profile');

	/*Category Routes*/
	Route::get('/category'	,	'Admin\\CategoryController@index')->name('categories');
	Route::get('/category/create'	,	'Admin\\CategoryController@create')->name('categories_create');
	Route::post('/category/create'	,	'Admin\\CategoryController@create');
	Route::get('/category/edit'	,	'Admin\\CategoryController@edit')->name('categories_edit');
	Route::post('/category/edit/{id?}'	,	'Admin\\CategoryController@edit')->name('categories_update');
	Route::get('/category/delete/{id?}'	,	'Admin\\CategoryController@delete')->name('categories_delete');


	Route::get('/orders'	,	'Admin\\OrdersController@index')->name('orders');
	Route::get('/orders/create'	,	'Admin\\OrdersController@create')->name('orders_create');
	Route::post('/orders/create'	,	'Admin\\OrdersController@create');
	Route::get('/orders/edit'	,	'Admin\\OrdersController@edit')->name('orders_edit');
	Route::post('/orders/edit/{id?}'	,	'Admin\\OrdersController@edit')->name('orders_update');
	Route::get('/orders/delete/{id?}'	,	'Admin\\OrdersController@delete')->name('orders_delete');

	Route::get('/order_items'	,	'Admin\\OrderItemsController@index')->name('order_items');
	Route::get('/order_items/create'	,	'Admin\\OrderItemsController@create')->name('order_items_create');
	Route::post('/order_items/create'	,	'Admin\\OrderItemsController@create');
	Route::get('/order_items/edit'	,	'Admin\\OrderItemsController@edit')->name('order_items_edit');
	Route::post('/order_items/edit/{id?}'	,	'Admin\\OrderItemsController@edit')->name('order_items_update');
	Route::get('/order_items/delete/{id?}'	,	'Admin\\OrderItemsController@delete')->name('order_items_delete');

	Route::get('/cart_items'	,	'Admin\\CartItemsController@index')->name('cart_items');
	Route::get('/cart_items/create'	,	'Admin\\CartItemsController@create')->name('cart_items_create');
	Route::post('/cart_items/create'	,	'Admin\\CartItemsController@create');
	Route::get('/cart_items/edit'	,	'Admin\\CartItemsController@edit')->name('cart_items_edit');
	Route::post('/cart_items/edit/{id?}'	,	'Admin\\CartItemsController@edit')->name('cart_items_update');
	Route::get('/cart_items/delete/{id?}'	,	'Admin\\CartItemsController@delete')->name('order_items_delete');
	

	// Tags

	Route::get('/tags'	,	'Admin\\TagsController@index')->name('tags');
	Route::get('/tags/create'	,	'Admin\\TagsController@create')->name('tags_create');
	Route::post('/tags/create'	,	'Admin\\TagsController@create');
	Route::get('/tags/edit'	,	'Admin\\TagsController@edit')->name('tags_edit');
	Route::post('/tags/edit/{id?}'	,	'Admin\\TagsController@edit')->name('tags_update');
	Route::get('/tags/delete/{id?}'	,	'Admin\\TagsController@delete')->name('tags_delete');


	/*Quiz Routes*/
	Route::get('/quizes'	,	'Admin\\QuizController@index');
	Route::get('/quizes/create/{id?}'	,	'Admin\\QuizController@create');
	Route::post('/quizes/create'	,	'Admin\\QuizController@create');
	Route::get('/quizes/edit'	,	'Admin\\QuizController@edit');
	Route::post('/quizes/edit/{id?}'	,	'Admin\\QuizController@edit');
	Route::get('/quizes/delete/{id?}'	,	'Admin\\QuizController@delete');

	Route::get('/quizes/import/{id?}'	,	'Admin\\QuizController@import');
	Route::post('/quizes/import/{id?}',	'Admin\\QuizController@import');

	/*Questions Routes*/
	Route::get('/questions/create/{id?}'	,	'Admin\\QuestionsController@create');
	Route::post('/questions/create'	,	'Admin\\QuestionsController@create');
	Route::get('/questions/edit'	,	'Admin\\QuestionsController@edit');
	Route::post('/questions/edit/{id?}'	,	'Admin\\QuestionsController@edit');
	Route::get('/questions/delete/{id?}'	,	'Admin\\QuestionsController@delete');
	Route::get('/questions/{id?}'	,	'Admin\\QuestionsController@index');

	/*Answers Routes*/
	Route::get('/answers/create/{id?}'	,	'Admin\\AnswersController@create');
	Route::post('/answers/create'	,	'Admin\\AnswersController@create');
	Route::get('/answers/edit'	,	'Admin\\AnswersController@edit');
	Route::post('/answers/edit/{id?}'	,	'Admin\\AnswersController@edit');
	Route::get('/answers/delete/{id?}'	,	'Admin\\AnswersController@delete');
	Route::get('/answers/{id?}'	,	'Admin\\AnswersController@index');
});

Route::prefix('/')->middleware(['auth','common_auth'])->group(function () {
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
Route::prefix('/instructor')->middleware(['auth','instructor_auth'])->group(function () {

	/*Courses Routes*/
	Route::get('/courses'	,	'Admin\\CoursesController@index');
	Route::get('/courses/create'	,	'Admin\\CoursesController@create');
	Route::post('/courses/create'	,	'Admin\\CoursesController@create');
	Route::get('/courses/edit'	,	'Admin\\CoursesController@edit');
	Route::post('/courses/edit/{id?}'	,	'Admin\\CoursesController@edit');
	Route::get('/courses/delete/{id?}'	,	'Admin\\CoursesController@delete');

	/*Syllabus Routes*/
	Route::get('/syllabus/create'	,	'Admin\\SyllabusController@create');
	Route::post('/syllabus/create'	,	'Admin\\SyllabusController@create');
	Route::get('/syllabus/edit'	,	'Admin\\SyllabusController@edit');
	Route::post('/syllabus/edit/{id?}'	,	'Admin\\SyllabusController@edit');
	Route::get('/syllabus/delete/{id?}'	,	'Admin\\SyllabusController@delete');
	Route::get('/syllabus/{id?}'	,	'Admin\\SyllabusController@index');


	/*Topics Routes*/
	Route::get('/topics/create/{id?}'	,	'Admin\\TopicsController@create');
	Route::post('/topics/create/{id?}'	,	'Admin\\TopicsController@create');
	Route::get('/topics/edit'	,	'Admin\\TopicsController@edit');
	Route::post('/topics/edit/{id?}'	,	'Admin\\TopicsController@edit');
	Route::get('/topics/delete/{id?}'	,	'Admin\\TopicsController@delete');
	Route::get('/topics/{id?}'	,	'Admin\\TopicsController@index');


	/*Lessons Routes*/
	Route::get('/lesson'	,	'Admin\\LessonController@index');
	Route::get('/lesson/create/{id?}'	,	'Admin\\LessonController@create');
	Route::post('/lesson/create'	,	'Admin\\LessonController@create');
	Route::get('/lesson/edit'	,	'Admin\\LessonController@edit');
	Route::get('/lesson/edit/{id?}'	,	'Admin\\LessonController@edit');
	Route::post('/lesson/edit/{id?}'	,	'Admin\\LessonController@edit');
	Route::get('/lesson/delete/{id?}'	,	'Admin\\LessonController@delete');

	/*Quiz Routes*/
	Route::get('/quizes'	,	'Admin\\QuizController@index');
	Route::get('/quizes/create/{id?}'	,	'Admin\\QuizController@create');
	Route::post('/quizes/create'	,	'Admin\\QuizController@create');
	Route::get('/quizes/edit'	,	'Admin\\QuizController@edit');
	Route::post('/quizes/edit/{id?}'	,	'Admin\\QuizController@edit');
	Route::get('/quizes/delete/{id?}'	,	'Admin\\QuizController@delete');

	/*Questions Routes*/
	Route::get('/questions/create/{id?}'	,	'Admin\\QuestionsController@create');
	Route::post('/questions/create'	,	'Admin\\QuestionsController@create');
	Route::get('/questions/edit'	,	'Admin\\QuestionsController@edit');
	Route::post('/questions/edit/{id?}'	,	'Admin\\QuestionsController@edit');
	Route::get('/questions/delete/{id?}'	,	'Admin\\QuestionsController@delete');
	Route::get('/questions/{id?}'	,	'Admin\\QuestionsController@index');

	/*Answers Routes*/
	Route::get('/answers/create/{id?}'	,	'Admin\\AnswersController@create');
	Route::post('/answers/create'	,	'Admin\\AnswersController@create');
	Route::get('/answers/edit'	,	'Admin\\AnswersController@edit');
	Route::post('/answers/edit/{id?}'	,	'Admin\\AnswersController@edit');
	Route::get('/answers/delete/{id?}'	,	'Admin\\AnswersController@delete');
	Route::get('/answers/{id?}'	,	'Admin\\AnswersController@index');
});


	// Admin Courses Routes

Route::get('/thank_you'	,	'MarketplaceController@thank_you');
Route::get('/marketplace/add_to_cart'	,	'MarketplaceController@add_to_cart');
Route::get('/marketplace/{check?}'	,	'HomeController@index');
Route::get('/take_quiz/{id}/{skip?}'	,	'MarketplaceController@take_quiz');
Route::post('/take_quiz/{id}/{skip?}'	,	'MarketplaceController@take_quiz');
Route::get('/generate_quiz_attempt/{id}/'	,	'MarketplaceController@generate_quiz_attempt');
Route::get('/checkout'	,	'CartItemsController@checkout');
Route::post('/checkout'	,	'CartItemsController@checkout');
Route::post('/accept_payment'	,	'CartItemsController@accept_payment');
		// Route::post('/checkout'	,	'MarketplaceController@checkout');

Route::get('/view_quiz/{id}/'	,	'MarketplaceController@view_quiz');

Route::get('/quiz_attempts'	,	'MarketplaceController@quiz_attempts');
Route::get('/profile'	,	'MarketplaceController@profile');


Route::get('/cart_items'	,	'CartItemsController@index')->name('cart_items');
Route::get('/cart_items/create'	,	'CartItemsController@create')->name('cart_items_create');
Route::post('/cart_items/create'	,	'CartItemsController@create');
Route::get('/cart_items/edit'	,	'CartItemsController@edit')->name('cart_items_edit');
Route::post('/cart_items/edit/{id?}'	,	'CartItemsController@edit')->name('cart_items_update');
Route::get('/cart_items/delete/{id?}'	,	'CartItemsController@delete')->name('order_items_delete');

		// Google
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::get('importExportView', 'QuizController@importExportView');
Route::get('export', 'Admin\\QuizController@export')->name('export');
Route::post('import', 'Admin\\QuizController@import')->name('import');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/',	'HomeController@home')->name('home');

