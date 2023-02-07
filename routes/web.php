<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MaterialController;
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
});
Route::get('/home', function () {
    return view('homepage');
})->name('homepage');

Route::get('/course-add', [CourseController::class, 'add'])->name('course.add');
Route::get('/course-view', [CourseController::class, 'index'])->name('course.view');
Route::post('/course-store', [CourseController::class, 'store'])->name('course.store');
Route::get('/course-edit/{course}',[CourseController::class,'edit'])->name('course.edit');
Route::post('/course-update', [CourseController::class, 'update'])->name('course.update');
Route::get('/course-delete/{course}', [CourseController::class, 'delete'])->name('course.delete');
Route::get('/course-search', [CourseController::class, 'search'])->name('course.search');
Route::get('/resource-view', [MaterialController::class, 'index'])->name('material.view');
Route::get('/resource-add', [MaterialController::class, 'getById'])->name('material.add');
Route::post('/material-store', [MaterialController::class, 'store'])->name('material.store');
// Route::get('/course-search', [MaterialController::class, 'search'])->name('material.search');
Route::get('/comment/{material_id}', [CommentController::class, 'add'])->name('comment.add');
Route::post('/comment-store', [CommentController::class, 'store'])->name('comment.store');
