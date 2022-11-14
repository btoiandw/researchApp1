<?php
use Illuminate\Support\Facades\Route;
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
    return view('login');
});
Route::get('/home',function(){
    return redirect()->route('dashboard');
})->name('home');

Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth'],
    'namespace' => 'App\Http\Controllers\Admin'
], function () {
    Route::get('/','DashboardController@index')->name('dashboard');
});

Auth::routes();

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
