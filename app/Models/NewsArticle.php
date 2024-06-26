<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsArticle extends Model
{
    use HasFactory;

    protected $table = 'news_article';

    protected $fillable = ['title', 'content', 'user_id', 'cover_image'];

    public function reactions()
    {
        return $this->hasMany(Reaction::class)->orderBy('created_at', 'desc');
    }
}
