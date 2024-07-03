<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\WriterController;
use App\Http\Middleware\UserIsAdmin;
use App\Http\Middleware\UserIsRevisor;
use App\Http\Middleware\UserIsWriter;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::resource('articles', ArticleController::class);
Route::get('/articles/category/{category}', [ArticleController::class, 'byCategory'])->name('articles.byCategory');
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/user/{user}', [ArticleController::class, 'byUser'])->name('articles.byUser');
Route::get('/article/search', [ArticleController::class, 'articleSearch'])->name('articles.search');

Route::middleware('auth')->group(function(){
    // rotte lavora con noi
    Route::get('/careers', [PublicController::class, 'careers'])->name('careers');
    Route::post('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careers.submit');
});

Route::middleware([UserIsAdmin::class])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::patch('/admin/{user}/set-admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::patch('/admin/{user}/set-revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::patch('/admin/{user}/set-writer', [AdminController::class, 'setWriter'])->name('admin.setWriter');
    Route::put('/admin/edit/{tag}/tag', [AdminController::class, 'editTag'])->name('admin.editTag');
    Route::delete('/admin/delete/{tag}/tag', [AdminController::class, 'deleteTag'])->name('admin.deleteTag');
    Route::put('/admin/edit/{category}/category', [AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::delete('/admin/delete/{category}/category', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');
    Route::post('/admin/category/store', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');

});

Route::middleware([UserIsRevisor::class])->group(function(){
    Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
    Route::post('/revisor/{article}/accept', [RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');
    Route::post('/revisor/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');
    Route::post('/revisor/{article}/undo', [RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
});

Route::middleware([UserIsWriter::class])->group(function(){
    Route::get('/articles/create', [ArticleController::class,'create'])->name('articles.create');
    Route::post('/articles/store', [ArticleController::class,'store'])->name('articles.store');
    Route::get('/writer/dashboard', [WriterController::class, 'dashboard'])->name('writer.dashboard');
    Route::get('/article/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/article/{article}/update', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/article/{article}/destroy', [ArticleController::class, 'destroy'])->name('articles.destroy');
});