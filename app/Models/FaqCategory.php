<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    protected $table = 'faq_categories';
    
    use HasFactory;

    protected $fillable = ['name'];

    public function questions()
    {
        return $this->hasMany(FaqQuestion::class);
    }
}
