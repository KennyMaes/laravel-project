<?php

namespace App\Http\Controllers;

use App\Models\NewsArticle;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

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
}
