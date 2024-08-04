<?php
namespace App\Services;

use App\Models\BlogArticles;

class ArticleService
{
  /**
   * 登録処理（新規追加）
   * @param  array $params
   * @return integer
   */
  public function registAddnew($params)
  {
        $article = new BlogArticles();
        $article->code = $params['code'];
        $article->title = $params['title'];
        $article->category = $params['category'];
        $article->detail = $params['detail'];
        $article->parent = $params['parent'];
        $article->rank = $params['rank'];
        $article->service = $params['service'];
        $article->status = $params['status'];
        $article->url1 = $params['url1'];
        $article->url2 = $params['url2'];
        $article->save();
        return $article->id;
  }

  /**
   * 登録処理（編集）
   * @param  array $params
   * @return void
   */
  public function registEdit($params)
  {
        $article = BlogArticles::find($params['id']);
        $article->code = $params['code'];
        $article->title = $params['title'];
        $article->category = $params['category'];
        $article->detail = $params['detail'];
        $article->parent = $params['parent'];
        $article->rank = $params['rank'];
        $article->service = $params['service'];
        $article->status = $params['status'];
        $article->url1 = $params['url1'];
        $article->url2 = $params['url2'];
        $article->save();
  }
}
