<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class,'index'])->name('dashboard');


Route::resource('ideas',IdeaController::class)->except(['index','create','show'])->middleware('auth');
Route::resource('ideas',IdeaController::class)->only('show');
Route::resource('ideas.comments',CommentController::class)->only('store')->middleware('auth');




 