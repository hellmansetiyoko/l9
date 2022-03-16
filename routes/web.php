<?php

use App\Http\Controllers\TeacherController;
use App\Http\Livewire\Teacher\ListTeacher;
use App\Http\Livewire\Teacher\ManageTeacher;
use App\Models\Teacher;
use App\Repositories\TeacherRepository;
use Illuminate\Http\Request;
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
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('teacher',[TeacherController::class, 'create'])->name('teacher.create');
Route::post('teacher/{teacher:nip}',[TeacherController::class, 'update'])->name('teacher.update');
Route::get('/teachers', [TeacherController::class, 'home'])->name('teacher.all');


// Route::get('teachers',ListTeacher::class)->name('teacher.all');
