<?php

use App\Http\Controllers\FaqCategoryController;
use App\Http\Controllers\NewsArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\FaqController;
use App\Models\FaqCategory;
use App\Models\NewsArticle;
use Illuminate\Support\Facades\Route;
use App\Models\User;

//GLOBAL
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

// DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// NEWS
Route::get('/news', function () {
    $articles = NewsArticle::all();
    return view('news.news-overview', ['articles' => $articles]);
})->name('news.overview');
Route::get('/news/new', function () {
    return view('news.create-news-article');
})->middleware(['auth', 'verified', 'admin'])->name('news-article.new');

Route::post('/news', [NewsArticleController::class, 'create'])->middleware(['auth', 'admin'])->name('news-article.create');
Route::delete('/news/{id}', [NewsArticleController::class, 'destroy'])->middleware(['auth', 'admin'])->name('news-article.delete');


Route::get('/news/{id}/edit', function ($id) {
    $article = NewsArticle::find($id);
    return view('news.update-news-article', ['article' => $article]);
})->middleware(['auth', 'verified', 'admin'])->name('news-article.edit');
Route::get('/news/{id}', function ($id) {
    $article = NewsArticle::find($id);
    return view('news.news-article-detail', ['article' => $article]);
})->name('news-article.get');

Route::put('/news-article/{id}', [NewsArticleController::class, 'update'])->middleware(['auth', 'verified', 'admin'])->name('news-article.update');

// REACTION
Route::post('/reaction/{article_id}', [ReactionController::class, 'create'])->name('reaction.create');

//FAQ
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/faq/new', function() {
    $categories = FaqCategory::all();
    return view('FAQ.faq-new', ['categories' => $categories]);
})->name('faq-question.new');
Route::post('/faq', [FaqController::class, 'createQuestion'])->name('faq-question.create');
Route::delete('/fac/{id}', [FaqController::class, 'delete'])->middleware(['auth', 'admin'])->name('faq.delete');

//FAQ Category
Route::get('/faq/new-category', function() {
    return view('FAQ.faq-category-new');
})->name('faq-category.new');
Route::post('/faq-category', [FaqCategoryController::class, 'create'])->name('faq-category.create');
Route::delete('/fac-category/{id}', [FaqCategoryController::class, 'delete'])->middleware(['auth', 'admin'])->name('faq-category.delete');

// USER
Route::get('/users', function () {
    $users = User::all();
    $currentUser = Auth::user();
    return view('user.user-overview', ['users' => $users, 'currentUser' => $currentUser]);
})->middleware(['auth', 'verified', 'admin'])->name('users');

Route::get('/users/{id}', function (string $id) {
    $user = User::find($id);
    $currentUser = Auth::user();
    return view('user.user-profile', ['user' => $user, 'currentUser' => $currentUser]);
})->middleware(['auth'])->name('users.profile');        

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
