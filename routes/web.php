<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\UserController;
use App\Models\Task;
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

Route::permanentRedirect('/', 'login');
Route::permanentRedirect('/dashboard', 'home');

Route::middleware(['auth', 'termsAccepted'])->group(function () {
    Route::get('home', HomeController::class)->name('home');
    Route::resource('users', UserController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);

    Route::group(['prefix' => 'notifications', 'as' => 'notifications.'], function () {
       Route::get('/', [NotificationsController::class, 'index'])->name('index');
       Route::put('/{notification}', [NotificationsController::class, 'update'])->name('update');
       Route::delete('/destroy', [NotificationsController::class, 'destroy'])->name('destroy');
    });

    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
});


Route::get('/terms', [TermsController::class, 'index'])->middleware('auth')->name('terms.index');
Route::post('/terms', [TermsController::class, 'store'])->middleware('auth')->name('terms.store');

require __DIR__.'/auth.php';
