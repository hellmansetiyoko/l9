<?php

use App\Models\Biodata;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BiodataController;
use App\Http\Livewire\Admin\Module\EditUserProfileInformation;
use Illuminate\Support\Facades\Auth;

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

Route::controller(UserController::class)->group(function () {
    Route::get('/users/all', 'all');
    // Route::post('/orders', 'store');
});

Route::controller(BiodataController::class)->group(function () {
    // Route::get('/biodata', 'index');

    Route::get('/biodata', 'index');
    Route::get('/biodata/{biodata}', 'editUser')->name('biodata.user');
    // Route::post('/orders', 'store');
});

Route::get('admin/user/edit/{user}', EditUserProfileInformation::class)->name('admin.edit-user');
Route::get( 'bio/{biodata:slug}', fn(Biodata $biodata)=>
                view('public.user-profile', ['bio' => $biodata])
                );
