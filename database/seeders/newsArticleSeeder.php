<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\NewsArticle;
use Illuminate\Database\Seeder;

class newsArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_user = User::find(1);

        NewsArticle::factory(2)->create(['user_id' => $admin_user->id]);
    }
}
