<?php

namespace App\Http\Controllers;

use App\Models\NewsArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class NewsArticleController extends Controller
{
    public function create(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'cover_image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['content'] = strip_tags($incomingFields['content']);
        $incomingFields['user_id'] = auth()->id();

        


        if (isset($incomingFields['cover_image'])) {
            error_log('Image exists');
            $coverImage = $incomingFields['cover_image'];
            $imageName = time().'.'.$coverImage->extension();  
            $coverImage->move(public_path('newsArticleCovers'), $imageName);
            $incomingFields['cover_image'] = $imageName;
        }

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

        $incomingFields = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'cover_image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['content'] = strip_tags($incomingFields['content']);
        $incomingFields['user_id'] = auth()->id();

        if (isset($incomingFields['cover_image'])) {
            $coverImage = $incomingFields['cover_image'];
            $imageName = Str::uuid().'.'.$coverImage->extension();  
            $coverImage->move(public_path('newsArticleCovers'), $imageName);
            $incomingFields['cover_image'] = $imageName;
        }

        $newsArticle->fill($incomingFields);
        $newsArticle->save();

        return redirect('/news');
    }

    public function destroy($id) {
        NewsArticle::destroy($id);
        return redirect('/news');
    }

    public function findAll() {
        $articles = NewsArticle::all();
        return view('news.news-overview', ['articles' => $articles]);
    }

    public function createArticleView() {
        return view('news.create-news-article');
    }
}
