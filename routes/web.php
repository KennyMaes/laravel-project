<?php

use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\FaqCategoryController;
use App\Http\Controllers\NewsArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\FaqController;
use App\Models\FaqCategory;
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
Route::get('/news', [NewsArticleController::class, 'findAll'])->name('news.overview');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/news/new', [NewsArticleController::class, 'createArticleView'])->name('news-article.new');
    Route::get('/news/edit/{id}', [NewsArticleController::class, 'updateArticleView'])->name('news-article.edit');
    Route::post('/news', [NewsArticleController::class, 'create'])->name('news-article.create');
    Route::put('/news-article/{id}', [NewsArticleController::class, 'update'])->name('news-article.update');
    Route::delete('/news/{id}', [NewsArticleController::class, 'destroy'])->name('news-article.delete');
});

Route::get('/news/{id}', [NewsArticleController::class, 'findById'])->name('news-article.get');


// REACTION
Route::post('/reaction/{article_id}', [ReactionController::class, 'create'])->name('reaction.create');

// FAQ
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/faq/new', [FaqController::class, 'createQuestionView'])->name('faq-question.new');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/faq/{id}', [FaqController::class, 'editView'])->name('faq.edit');
    Route::post('/faq', [FaqController::class, 'createQuestion'])->name('faq.create');
    Route::put('/faq/{id}', [FaqController::class, 'updateQuestion'])->name('faq.update');
    Route::delete('/fac/{id}', [FaqController::class, 'delete'])->name('faq.delete');
});

// FAQ Category
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/faq/category/new', function() {
        return view('FAQ.faq-category-form');
    })->name('faq-category.new');
    Route::get('/faq/category/{id}', function($id) {
        $category = FaqCategory::find($id);
        return view('FAQ.faq-category-form', ['category' => $category]);
    })->name('faq-category.edit');
    Route::post('/faq-category', [FaqCategoryController::class, 'create'])->name('faq-category.create');
    Route::put('/faq-category/{id}', [FaqCategoryController::class, 'update'])->name('faq-category.update');
    Route::delete('/fac-category/{id}', [FaqCategoryController::class, 'delete'])->name('faq-category.delete');
});

// COTACT-FORM
Route::get('/contact-form', function() {
    return view('contact.contact-form');
})->name('contact-form.view');
Route::post('/contact-form', [ContactRequestController::class, 'post'])->name('contact-form.post');
Route::middleware((['auth', 'admin']))->group(function() {
    Route::get('/contact-form/overview', [ContactRequestController::class, 'overview'])->name('contact-requests.overview');
});


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
