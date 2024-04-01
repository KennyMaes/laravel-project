<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'news_article_id',
    ];

    public function newsArticle()
    {
        return $this->belongsTo(NewsArticle::class);
    }
}
