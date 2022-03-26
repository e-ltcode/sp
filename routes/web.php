<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailerController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\CartItemsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\AnswersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\QuestionsController;
use App\Http\Controllers\Admin\OrderItemsController;
use App\Http\Controllers\FreeTestController;

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
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index']);
Route::prefix('admin')->middleware(['auth', 'admin_auth'])->group(function () {
    Route::get('/profile_page', [AdminController::class, 'profile']);

    Route::get('/edit_login_details/{user_id?}', [AdminController::class, 'edit_login_details']);
    Route::post('/edit_login_details/', [AdminController::class, 'edit_login_details']);

    Route::get('/', [AdminController::class, 'index']);
    Route::get('/dashboard', [AdminController::class, 'index']);

    /* User Routes */
    Route::get('users', [UserController::class, 'index']);
    Route::get('users/create', [UserController::class, 'create']);
    Route::post('users/create', [UserController::class, 'create']);
    Route::get('users/edit/{id?}', [UserController::class, 'edit']);
    Route::post('users/edit/{id?}', [UserController::class, 'edit']);
    Route::get('users/update/{id?}', [UserController::class, 'update']);
    Route::get('users/delete/{id}', [UserController::class, 'delete']);
    Route::post('update-profile', [UserController::class, 'updateProfile']);

    /*Category Routes*/
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category/create', [CategoryController::class, 'create']);
    Route::get('/category/edit', [CategoryController::class, 'edit']);
    Route::post('/category/edit/{id?}', [CategoryController::class, 'edit']);
    Route::get('/category/delete/{id?}', [CategoryController::class, 'delete']);

    Route::get('/orders', [OrdersController::class, 'index']);
    Route::get('/orders/create', [OrdersController::class, 'create']);
    Route::post('/orders/create', [OrdersController::class, 'create']);
    Route::get('/orders/edit', [OrdersController::class, 'edit']);
    Route::post('/orders/edit/{id?}', [OrdersController::class, 'edit']);
    Route::get('/orders/delete/{id?}', [OrdersController::class, 'delete']);

    Route::get('/order_items', [OrderItemsController::class, 'index']);
    Route::get('/order_items/create', [OrderItemsController::class, 'create']);
    Route::post('/order_items/create', [OrderItemsController::class, 'create']);
    Route::get('/order_items/edit', [OrderItemsController::class, 'edit']);
    Route::post('/order_items/edit/{id?}', [OrderItemsController::class, 'edit']);
    Route::get('/order_items/delete/{id?}', [OrderItemsController::class, 'delete']);

    Route::get('/cart_items', [CartItemsController::class, 'index']);
    Route::get('/cart_items/create', [CartItemsController::class, 'create']);
    Route::post('/cart_items/create', [CartItemsController::class, 'create']);
    Route::get('/cart_items/edit', [CartItemsController::class, 'edit']);
    Route::post('/cart_items/edit/{id?}', [CartItemsController::class, 'edit']);
    Route::get('/cart_items/delete/{id?}', [CartItemsController::class, 'delete']);

    // Route::get('/tags', [TagsController::class, 'index']);
    // Route::get('/tags/create', [TagsController::class, 'create']);
    // Route::post('/tags/create', [TagsController::class, 'create']);
    // Route::get('/tags/edit', [TagsController::class, 'edit']);
    // Route::post('/tags/edit/{id?}', [TagsController::class, 'edit']);
    // Route::get('/tags/delete/{id?}', [TagsController::class, 'delete']);

    /*Quiz Routes*/
    Route::get('/quizes', [QuizController::class, 'index']);
    Route::get('/quizes/create', [QuizController::class, 'create']);
    Route::post('/quizes/create', [QuizController::class, 'create']);
    Route::get('/quizes/edit', [QuizController::class, 'edit']);
    Route::post('/quizes/edit/{id?}', [QuizController::class, 'edit']);
    Route::get('/quizes/delete/{id?}', [QuizController::class, 'delete']);

    Route::get('/quizes/import/{id?}', [QuizController::class, 'import']);
    Route::post('/quizes/import/{id?}', [QuizController::class, 'import']);

    /*Questions Routes*/
    Route::get('/questions', [QuestionsController::class, 'index']);
    Route::get('/questions/create', [QuestionsController::class, 'create']);
    Route::post('/questions/create', [QuestionsController::class, 'create']);
    Route::get('/questions/edit', [QuestionsController::class, 'edit']);
    Route::post('/questions/edit/{id?}', [QuestionsController::class, 'edit']);
    Route::get('/questions/delete/{id?}', [QuestionsController::class, 'delete']);
    Route::get('/questions/{id?}', [QuestionsController::class, 'index']);

    /*Answers Routes*/
    Route::get('/answers/create', [AnswersController::class, 'create']);
    Route::post('/answers/create', [AnswersController::class, 'create']);
    Route::get('/answers/edit', [AnswersController::class, 'edit']);
    Route::post('/answers/edit/{id?}', [AnswersController::class, 'edit']);
    Route::get('/answers/delete/{id?}', [AnswersController::class, 'delete']);
    Route::get('/answers/{id?}', [AnswersController::class, 'index']);
});

Route::prefix('/')->middleware(['auth', 'common_auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
// Admin Courses Routes

Route::get('/submitted/{quizAttemptId}', [MarketplaceController::class, 'thank_you']);
Route::get('/marketplace/add_to_cart', [MarketplaceController::class, 'add_to_cart']);
// Route::get('/marketplace/add_to_cart?{premium?}', [MarketplaceController::class, 'add_to_cart']);
Route::get('/marketplace/{check?}', [HomeController::class, 'index'])->name('marketplace');
Route::get('/marketplace?{category?}', [HomeController::class, 'index']);
Route::get('/marketplace_test/{check?}', [HomeController::class, 'test_marketplace']);
Route::get('/take_quiz/{id}/{skip?}', [MarketplaceController::class, 'take_quiz']);
Route::post('/take_quiz/{id}/{skip?}', [MarketplaceController::class, 'take_quiz']);
Route::get('/generate_quiz_attempt/{id}/', [MarketplaceController::class, 'generate_quiz_attempt']);
Route::get('/checkout', [CartItemsController::class, 'checkout']);
Route::post('/checkout', [CartItemsController::class, 'checkout']);
Route::post('/accept_payment', [CartItemsController::class, 'accept_payment']);
Route::get('/accept_payment', [CartItemsController::class, 'accept_payment']);
Route::get("/email", [MailerController::class, "email"]);
Route::post("/send-email", [MailerController::class, "composeEmail"]);

Route::get('/view_quiz/{id}/', [MarketplaceController::class, 'view_quiz']);

Route::get('/quiz_attempts', [MarketplaceController::class, 'quiz_attempts']);
Route::get('/profile', [MarketplaceController::class, 'profile']);

Route::get('/cart_items', [CartItemsController::class, 'index']);
Route::get('/cart_items/create', [CartItemsController::class, 'create']);
Route::post('/cart_items/create', [CartItemsController::class, 'create']);
Route::get('/cart_items/edit', [CartItemsController::class, 'edit']);
Route::post('/cart_items/edit/{id?}', [CartItemsController::class, 'edit']);
Route::get('/cart_items/delete/{id?}', [CartItemsController::class, 'delete']);

Route::get('/privacy', [HomeController::class, 'privacy']);
Route::get('/terms', [HomeController::class, 'terms']);

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('importExportView', [QuizController::class, 'importExportView']);
Route::get('export', [QuizController::class, 'export']);
Route::post('import', [QuizController::class, 'import']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/', [HomeController::class, 'home']);

Route::get('/score-free-quiz/{quiz_id}', [FreeTestController::class, 'generate_quiz_attempt'])->name('score-free-quiz');
