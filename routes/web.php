<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::get('/api', [PageController::class, 'api'])->name('api');
Route::view('/blog', 'blog')->name('blog');
Route::get('/sitemap', [PageController::class, 'sitemap'])->name('sitemap');
Route::get('/change-logs', [PageController::class, 'changeLogs'])->name('change-logs');
Route::get('/yekvand', [PageController::class, 'yekvand'])->name('yekvand');

Route::get('/', [PageController::class, 'home'])->name('home');
Route::post('shorten', [\App\Http\Controllers\LinkController::class, 'shorten'])->name('shorten');
Route::get('{uri}', [\App\Http\Controllers\LinkController::class, 'redirect'])->name('redirect');
Route::get('statistics/{uri}', [\App\Http\Controllers\LinkController::class, 'statistics'])->name('statistics');
