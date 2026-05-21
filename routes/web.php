<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BirthdayController;

Route::get('/', [BirthdayController::class, 'login'])->name('login');
Route::get('/question', [BirthdayController::class, 'question'])->name('question');
Route::get('/home', [BirthdayController::class, 'home'])->name('home');
Route::get('/story', [BirthdayController::class, 'story'])->name('story');
Route::get('/memories', [BirthdayController::class, 'memories'])->name('memories');
Route::get('/surprise', [BirthdayController::class, 'surprise'])->name('surprise');
