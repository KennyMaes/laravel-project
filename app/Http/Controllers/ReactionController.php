<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reaction;

class ReactionController extends Controller
{
    function create($article_id) {
        request()->validate([
            'content' => 'required'
        ]);
        $content = request()->content;
        $reaction = new Reaction();
        $reaction->content = $content;
        $reaction->user_id = auth()->id();
        $reaction->news_article_id = $article_id;
    
        $reaction->save();
        return redirect('/news/'. $article_id);

    }
}
