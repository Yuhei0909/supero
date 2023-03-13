<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TweetController;

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

Route::middleware('auth')->group(function () {
    Route::get('/tweet/search/input', [SearchController::class, 'create'])->name('search.input');
    Route::get('/tweet/search/result', [SearchController::class, 'index'])->name('search.result');
    Route::get('/tweet/timeline', [TweetController::class, 'timeline'])->name('tweet.timeline');
    Route::get('user/{user}', [FollowController::class, 'show'])->name('follow.show');
    Route::post('user/{user}/follow', [FollowController::class, 'store'])->name('follow');
    Route::post('user/{user}/unfollow', [FollowController::class, 'destroy'])->name('unfollow');
    Route::post('tweet/{tweet}/favorites', [FavoriteController::class, 'store'])->name('favorites');
    Route::post('tweet/{tweet}/unfavorites', [FavoriteController::class, 'destroy'])->name('unfavorites');
    Route::get('/tweet/mypage', [TweetController::class, 'mydata'])->name('tweet.mypage');
    Route::resource('tweet', TweetController::class);
    Route::resource('information', InformationController::class);
    Route::resource('comment', CommentController::class)->only([
    'store' ]);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/blogs', 'App\Http\Controllers\BlogController@index')->name('blogs.index');
Route::get('/blogs/create', 'App\Http\Controllers\BlogController@create')->name('blog.create')->middleware('auth');
Route::post('/blogs/store/', 'App\Http\Controllers\BlogController@store')->name('blog.store')->middleware('auth');
Route::get('/blogs/edit/{blog}', 'App\Http\Controllers\BlogController@edit')->name('blog.edit')->middleware('auth');
Route::put('/blogs/edit/{blog}', 'App\Http\Controllers\BlogController@update')->name('blog.update')->middleware('auth');
Route::delete('/blogs/{blog}', 'App\Http\Controllers\blogController@destroy')->name('blog.destroy')->middleware('auth');

require __DIR__.'/auth.php';
