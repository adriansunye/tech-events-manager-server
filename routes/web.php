<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserEventsController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\UserEventController;
use Illuminate\Support\Facades\Redirect;

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
    return redirect('/listevents');
});

Route::resource('/listevents', EventController::class, [
    'names' => 'events',
    'parameters' => ['listevents' => 'event'],
]);

Route::group(['middleware' => 'guest'], function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/userevents', [UserEventController::class, 'index'])->name('user.events');
});

Route::post('/listevents/{event}/join', [JoinController::class, 'update'])->name('relation');


Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::fallback(function (){
    return to_route('events.index');
});
