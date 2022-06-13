<?php

use Illuminate\Support\Facades\Route;


use Illuminate\Foundation\Application;
// use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Lost;
use App\Models\LostCategory;
use Illuminate\Http\Request;

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

require __DIR__.'/auth.php';







Route::get('/', function () {
    return view('welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::post("/location/load/more", [App\Http\Controllers\LocationsController::class, 'loadMore'] )->name('load.more');
Route::resource('location', 'App\Http\Controllers\LocationsController');

Route::get('about', function(){
    return view('About');
})->name('pages.about');


Route::prefix('/user')->name('user.')->namespace('App\Http\Controllers')
    ->as('user.')->group(function () {
        Route::get('single/lost', 'LostsController@show')->name('single.lost');
        Route::get('create/lost', 'LostsController@create')->name('create.lost');
        Route::post('present/lost', 'LostsController@store')->name('present.lost');
        Route::get('show/lost/{id}', 'LostsController@show')->name('show.lost');
        Route::resource('lost', LostsController::class, ['except' => ['create', 'store', 'show'] ]);     
});


Route::get('/dashboard', function () {
    $losts = Lost::select('*')->with('lost_category')->get();
    $lostCategories = LostCategory::select('name', 'id')->get();
    return view('dashboard', compact('losts', 'lostCategories'));
})->name('dashboard');


