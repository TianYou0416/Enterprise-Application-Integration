<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SoapLoginController;
use App\Models\Event;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SoapLoginController::class, 'showLoginForm']);
Route::post('/soap-login', [SoapLoginController::class, 'loginViaSoap'])->name('soap.login.submit');

Route::get('/home', function () {
    $events = Event::latest()->take(6)->get();
    return view('HomePage', compact('events'));
});


Route::get('/category/{category}', [EventController::class, 'category'])->name('events.category');

Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

Route::get('/register/{event_id}', [RegistrationController::class, 'create'])->name('register.form');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.submit');





