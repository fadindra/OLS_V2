<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PaymentController;
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
    return view('index');
})->middleware('auth')->name('index');

// Route::get('/payment', function () {
//     return view('welcome');
// })->name('course.payment');

// Route::get('/login', function () {
//     return view('login.login');
// })->name('login');

// Route::get('/register', function () {
//     return view('login.register');
// })->name('register');

// Route::get('/course-detail', function () {
//     return view('course_detail');
// })->name('course.detail');

Route::get('/course-add', [CourseController::class, 'add'])->name('course.add');
Route::get('/course-view', [CourseController::class, 'index'])->name('course.view');
Route::get('/course-list', [CourseController::class, 'course_list'])->name('course.list');
Route::get('/learner-course-list', [CourseController::class, 'getCourseByLearner'])->name('learners.courselist');
Route::post('/course-store', [CourseController::class, 'store'])->name('course.store');
Route::get('/course-edit/{course}',[CourseController::class,'edit'])->name('course.edit');
Route::post('/course-update', [CourseController::class, 'update'])->name('course.update');
Route::get('/course-delete/{course}', [CourseController::class, 'delete'])->name('course.delete');
Route::get('/course-search', [CourseController::class, 'search'])->name('course.search');
Route::get('/home', [CourseController::class, 'getAll'])->name('homepage');
Route::get('/course-detail/{course}', [CourseController::class, 'getById'])->name('course.detail');
Route::get('/resource-view', [MaterialController::class, 'index'])->name('material.view');
Route::get('/resource-add', [MaterialController::class, 'getById'])->name('material.add');
Route::post('/material-store', [MaterialController::class, 'store'])->name('material.store');
// Route::get('/course-search', [MaterialController::class, 'search'])->name('material.search');
Route::get('/comment/{material_id}', [CommentController::class, 'add'])->name('comment.add');
Route::post('/comment-store', [CommentController::class, 'store'])->name('comment.store');


Route::post('/pay', [PaymentController::class, 'pay'])->name('pay');
Route::get('/success', [PaymentController::class, 'paySuccess']);
Route::get('/failure', [PaymentController::class, 'payFailure']);
Route::get('/payment/{course}', [PaymentController::class, 'index'])->name('course.payment');


// Login Routes
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
// Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [LoginController::class, 'register']);
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('dashboard', [LoginController::class, 'dashboard']); 
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [LoginController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [LoginController::class, 'signOut'])->name('signout');
Route::get('profile', [LoginController::class, 'profile'])->name('profile');