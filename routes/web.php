<?php

use App\Http\Controllers\NewsArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReactionController;
use App\Models\NewsArticle;
use Illuminate\Support\Facades\Route;
use App\Models\User;

//GLOBAL
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

// DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// NEWS
Route::delete('/news/{id}', [NewsArticleController::class, 'destroy'])->name('news-article.delete');
Route::get('/news', function () {
    $articles = NewsArticle::all();
    return view('news.news-overview', ['articles' => $articles]);
})->middleware(['auth', 'verified'])->name('news.overview');

Route::post('/news', [NewsArticleController::class, 'create'])->name('news-article.create');

Route::get('/news/new', function () {
    return view('news.create-news-article');
})->middleware(['auth', 'verified', 'admin'])->name('news-article.new');

Route::get('/news/{id}/edit', function ($id) {
    $article = NewsArticle::find($id);
    return view('news.update-news-article', ['article' => $article]);
})->middleware(['auth', 'verified', 'admin'])->name('news-article.edit');

Route::put('/news-article/{id}', [NewsArticleController::class, 'update'])->middleware(['auth', 'verified', 'admin'])->name('news-article.update');

Route::get('/news/{id}', function ($id) {
    $article = NewsArticle::find($id);
    return view('news.news-article-detail', ['article' => $article]);
})->middleware(['auth', 'verified'])->name('news-article.get');

// REACTION
Route::post('/reaction/{article_id}', [ReactionController::class, 'create'])->name('reaction.create');

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
