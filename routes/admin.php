<?php

use App\Http\Controllers\Admin\Album\CooperationController;
use App\Http\Controllers\Admin\Album\PhotoController;
use App\Http\Controllers\Admin\Album\VideoController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RichTextAttachmentController;
use App\Http\Controllers\Admin\ScienceInforController;
use App\Http\Controllers\Admin\Staff\DepartmentController;
use App\Http\Controllers\Admin\Staff\StaffController;
use App\Http\Controllers\Admin\Support\TinymceController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('categories', CategoryController::class);

        //post of category
        Route::get('category/{slug}', [PostController::class, 'index'])->name('categories.posts.index');
        Route::get('category/{category}/posts/create', [PostController::class, 'create'])->name('categories.posts.create');
        Route::post('category/{category}/posts', [PostController::class, 'store'])->name('categories.posts.store');
        Route::get('category/{category}/posts/{post}/edit', [PostController::class, 'edit'])->name('categories.posts.edit');
        Route::put('category/{category}/posts/{post}', [PostController::class, 'update'])->name('categories.posts.update');
        Route::delete('category/{category}/posts/{post}', [PostController::class, 'destroy'])->name('categories.posts.destroy');

        Route::resource('announcements', AnnouncementController::class);
        Route::resource('scienceinfors', ScienceInforController::class);
        //album-photo-video
        Route::resource('albums', AlbumController::class);
        Route::resource('photos', PhotoController::class);
        Route::resource('videos', VideoController::class);
        Route::resource('cooperations', CooperationController::class);

        //contact
        Route::resource('contacts', ContactController::class);
        //faq
        Route::resource('faqs', FaqController::class);

        //Department and staff
        Route::resource('departments', DepartmentController::class);
        Route::resource('staffs', StaffController::class);

        /*
         *  KEEP THESE AT THE END OF THE FILE
         */
        Route::post('rich-text-attachment', RichTextAttachmentController::class)->name('rich-text.attachment');
        Route::post('tinymce-attachment', TinymceController::class)->name('tinymce.attachment');
    });
});

require __DIR__.'/auth.php';
