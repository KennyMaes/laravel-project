<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\NewsArticle;
use Illuminate\Database\Seeder;

class UserNewsArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_user = User::find(1);
        $newsArticles = NewsArticle::all();

        foreach ($newsArticles as $newsArticle) {
            $newsArticle->users()->attach($admin_user);
        }
    }
}
