<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

/*----------------------------Course Routes------------------------------------------*/

Route::get('/course-add', [CourseController::class, 'add'])->name('course.add');
Route::get('/course-view', [CourseController::class, 'index'])->name('course.view');
Route::get('/course-list', [CourseController::class, 'course_list'])->name('course.list');
Route::get('/course-list-all', [CourseController::class, 'course_lists'])->name('course.lists');
Route::get('/learner-course-list', [CourseController::class, 'getCourseByLearner'])->name('learners.courselist');
Route::post('/course-store', [CourseController::class, 'store'])->name('course.store');
Route::get('/course-edit/{course}',[CourseController::class,'edit'])->name('course.edit');
Route::post('/course-update', [CourseController::class, 'update'])->name('course.update');
Route::get('/course-delete/{course}', [CourseController::class, 'delete'])->name('course.delete');
Route::get('/course-search', [CourseController::class, 'search'])->name('course.search');
Route::get('/course-detail/{course}', [CourseController::class, 'getById'])->name('course.detail');

/* ----------------------------Homepage Route-----------------------------------------*/

Route::get('/home', [CourseController::class, 'getAll'])->name('homepage');

/*-----------------------------Resources and Comment Routes---------------------------*/ 

Route::get('/resource-view', [MaterialController::class, 'index'])->name('material.view');
Route::get('/resource-add', [MaterialController::class, 'getById'])->name('material.add');
Route::post('/material-store', [MaterialController::class, 'store'])->name('material.store');
// Route::get('/course-search', [MaterialController::class, 'search'])->name('material.search');
Route::get('/comment/{material_id}', [CommentController::class, 'add'])->name('comment.add');
Route::post('/comment-store', [CommentController::class, 'store'])->name('comment.store');

/*-----------------------------Assessment Routes-----------------------------------------*/
Route::get('/assessment-view', [AssessmentController::class, 'index'])->name('assessement.view');
Route::get('/assessment-add', [AssessmentController::class, 'getById'])->name('assessement.add');
Route::post('/assessment-store', [AssessmentController::class, 'store'])->name('assessement.store');
Route::get('/assessment/{assessment_id}', [AssessmentController::class, 'getAssessments'])->name('assessement.submit.add');
Route::post('/assessment-submit-store', [AssessmentController::class, 'submitAssessmentStore'])->name('assessement.submit.store');
/*-----------------------------Payment Routes-----------------------------------------*/

Route::post('/pay', [PaymentController::class, 'pay'])->name('pay');
Route::get('/success', [PaymentController::class, 'paySuccess']);
Route::get('/failure', [PaymentController::class, 'payFailure']);
Route::get('/payment/{course}', [PaymentController::class, 'index'])->name('course.payment');



// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
// Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [LoginController::class, 'register']);
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


/*------------------------------Login Routes----------------------------------------*/

Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard'); 
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [LoginController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [LoginController::class, 'signOut'])->name('signout');
Route::get('profile', [LoginController::class, 'profile'])->name('profile');


/*------------------------------Admin Routes----------------------------------------*/
// Route::get('learner-list', [LoginController::class, 'manage_learner'])->name('manage.learner');
// Route::get('learner-list', [LoginController::class, 'manage_instructor'])->name('manage.instructor');
Route::get('learner-list', [CourseController::class, 'manage_learner'])->name('manage.learner');
Route::get('instructor-list', [CourseController::class, 'manage_instructor'])->name('manage.instructor');