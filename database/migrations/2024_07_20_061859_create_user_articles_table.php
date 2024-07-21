<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('news_article_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('news_article_id')->constrained()->onDelete('cascade');
            $table->primary(['user_id', 'news_article_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user-articles');
    }
};
