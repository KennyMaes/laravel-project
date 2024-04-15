<?php

namespace App\Http\Controllers;

use App\Models\NewsArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class NewsArticleController extends Controller
{
    public function create(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['content'] = strip_tags($incomingFields['content']);
        $incomingFields['user_id'] = auth()->id();

        NewsArticle::create($incomingFields);
        return redirect('/news');
    }

    public function findById($id) {
        $article = NewsArticle::find($id);
        return view('news.news-article-detail', ['article' => $article]);
    }

    public function updateArticleView($id) {
        $article = NewsArticle::find($id);
        return view('news.update-news-article', ['article' => $article]);
    }

    public function update($id) {
        $newsArticle = NewsArticle::findOrFail($id);
        $newsArticle->fill(request()->all());
        $newsArticle->save();

        return redirect('/news');
    }

    public function destroy($id) {
        NewsArticle::destroy($id);
        return redirect('/news');
    }

    public function findAll() {
        error_log('Test 123');
        $articles = NewsArticle::all();
        return view('news.news-overview', ['articles' => $articles]);
    }

    public function createArticleView() {
        return view('news.create-news-article');
    }
}
