<?php

use App\Http\Controllers\Web\AnnouncementsController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\NewsController;
use App\Http\Controllers\Web\ScienceInformationController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/tin-tuc', [NewsController::class, 'index'])->name('news.index');
Route::get('/tin-tuc/{post:slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/thong-bao', [AnnouncementsController::class, 'index'])->name('announcements.index');
Route::get('/thong-bao/{announcement:slug}', [AnnouncementsController::class, 'show'])->name('announcements.show');
Route::get('/thong-tin-khoa-hoc', [ScienceInformationController::class, 'index'])->name('scienceinformation.index');
Route::get('/thong-tin-khoa-hoc/{scienceinformation:slug}', [ScienceInformationController::class, 'show'])->name('scienceinformation.show');

Route::get('/lien-he', [ContactController::class, 'index'])->name('contacts.index');
Route::post('/lien-he', [ContactController::class, 'store'])->name('contacts.store');

// Route::get('/gioi-thieu', fn () => view('web.about'))->name('about');

Route::get('/categories/{category:slug}/posts', [CategoryController::class, 'showAllPosts'])->name('categories.posts.index');
Route::get('/categories/{category:slug}/posts/{post:slug}', [CategoryController::class, 'showPost'])->name('categories.posts.show');

require __DIR__.'/admin.php';
