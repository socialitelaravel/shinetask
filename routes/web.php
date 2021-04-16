<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/email',function(){
//     Mail::to('email@test.com')->send(new WelcomeMail());


// });

//for update Laravel Profile
Route::get('updateProfile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Route::post('updateProfile', [App\Http\Controllers\ProfileController::class, 'updateProfile'])->name('updateProfile');


//socialite login
Route::get('auth/social',[App\Http\Controllers\Auth\LoginController::class,'show'])->name('social.login');
Route::get('oauth/{driver}',[App\Http\Controllers\Auth\LoginController::class,'redirectToProvider'])->name('social.oauth');
Route::get('oauth/{driver}/callback',[App\Http\Controllers\Auth\LoginController::class,'handleProviderCallback'])->name('social.callback');




