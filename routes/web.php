<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\IdeaController as AdminIdeaController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;

Route::get('/', [DashboardController::class,'index'])->name('dashboard');

Route::get('/lang/{lang}',function($lang)
{
app()->setLocale($lang);
session()->put('locale',$lang);
return redirect()->route('dashboard');
}
)->name('lang');

Route::resource('ideas',IdeaController::class)->except(['index','create','show'])->middleware('auth');
Route::resource('ideas',IdeaController::class)->only('show');
Route::resource('ideas.comments',CommentController::class)->only('store')->middleware('auth');

Route::resource('users',UserController::class)->only('show');
Route::resource('users',UserController::class)->only('edit','update')->middleware('auth');

Route::get('/profile',[UserController::class,'profile'])->middleware('auth')->name('profile');
Route::post('/users/{user}/follow',[FollowerController::class,'follow'])->middleware('auth')->name('users.follow');
Route::post('/users/{user}/unfollow',[FollowerController::class,'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('/ideas/{idea}/like',[IdeaLikeController::class,'like'])->middleware('auth')->name('ideas.like');
Route::post('/ideas/{idea}/unlike',[IdeaLikeController::class,'unlike'])->middleware('auth')->name('ideas.unlike');

Route::get('/feed',FeedController::class)->middleware('auth')->name('Feed');

Route::middleware(['auth','admin'])->prefix('/admin')->as('admin.')->group(function(){
Route::get('/',[AdminDashboard::class,'index'])->name('dashboard');
Route::resource('users',AdminUserController::class)->only('index');
Route::resource('ideas',AdminIdeaController::class)->only('index');
Route::resource('comments',AdminCommentController::class)->only('index','destroy');


});


Route::get('terms',function(){
    return view('terms');
})->name('terms');
