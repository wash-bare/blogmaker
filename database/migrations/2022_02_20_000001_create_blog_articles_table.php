<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_articles', function (Blueprint $table) {
            $table->id();
            $table->string('code', 128)->comment('コード');
            $table->string('title', 128)->comment('タイトル');
            $table->string('category', 64)->nullable()->comment('カテゴリ');
            $table->text('detail')->nullable()->comment('概要');
            $table->string('parent')->nullable()->comment('親コード');
            $table->string('rank', 2)->nullable()->comment('ランク');
            $table->string('service', 16)->nullable()->comment('サイト区分');
            $table->string('status', 2)->default(0)->comment('状態');
            $table->string('url1', 256)->nullable()->comment('URL1');
            $table->string('url2', 256)->nullable()->comment('URL2');
            $table->timestamps();
            $table->boolean('deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_articles');
    }
}
