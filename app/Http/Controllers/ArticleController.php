<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Pagination\Paginator;
use App\Models\BlogArticles;
use App\Models\Category;
use App\Models\Service;
use App\Services\ArticleService;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 初期表示・検索する
     * @param  Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $query = DB::table('blog_articles as a')->select(
          'a.id as blog_id',
          'a.code as code',
          'a.title as title',
          'b.name as category_name',
          'a.detail as detail',
          'a.parent as parent',
          'a.rank as rank',
          'c.name1 as service_name',
          'a.status as status',
          'a.url1 as url1',
          'a.url2 as url2',
          'a.created_at as created_at',
          'a.updated_at as updated_at',
          'a.deleted as deleted'
        )->leftJoin('category as b', function($join) {
          $join->on('a.category', '=', 'b.code')
          ->where('b.deleted', 0);
        })->leftJoin('service as c', function($join) {
          $join->on('a.service', '=', 'c.code')
          ->where('c.deleted', 0);
        });
        // ユニークコード・親コード
        $code = $request->search_code;
        if (!empty($code)) {
          $query->where('a.code', 'LIKE', "%$code%");
          $query->orWhere('a.parent', 'LIKE', "%$code%");
        }
        // タイトル
        $title = $request->search_title;
        if (!empty($title)) {
          $query->where('a.title', 'LIKE', "%$title%");
        }
        // カテゴリ
        $category_name = $request->search_category;
        if (!empty($category_name)) {
          $query->where('b.name', 'LIKE', "%$category_name%");
        }
        // ランク
        $rank = $request->search_rank;
        if (!empty($rank)) {
          $query->where('a.rank', $rank);
        }
        // サイト区分
        $service_name = $request->search_service;
        if (!empty($service_name)) {
          $query->where('c.name1', 'LIKE', "%$service_name%");
          $query->orWhere('c.name2', 'LIKE', "%$service_name%");
        }
        // 状態
        $status = $request->search_status;
        if (!empty($status)) {
          $query->where('a.status', $status);
        }
        $query->orderBy('a.updated_at', 'desc');
        $query->get();
        return view('article/index')->with([
          'rows' => $query->paginate(10),
          'code' => $code,
          'title' => $title,
          'category_name' => $category_name,
          'rank' => $rank,
          'service_name' => $service_name,
          'status' => $status,
        ]);
    }

    /**
     * 新規追加する
     * @param  Request $request
     * @return View
     */
    public function addnew(Request $request)
    {
      return view('article/addnew')->with([
        'new_code' => (new BlogArticles())->getNewCode(),
        'categories' => (new Category())->getList(),
        'services' => (new Service())->getList('article'),
      ]);
    }

    /**
     * 登録処理（新規追加）
     * @param  ArticleRequest $request
     * @return void
     */
    public function regist_addnew(ArticleRequest $request)
    {
      (new ArticleService())->registAddnew([
        'code' => $request->input_code,
        'title' => $request->input_title,
        'category' => $request->input_category,
        'detail' => $request->input_detail,
        'parent' => $request->input_parent,
        'rank' => $request->input_rank,
        'service' => $request->input_service,
        'status' => $request->input_status,
        'url1' => $request->input_url1,
        'url2' => $request->input_url2,
      ]);
      return redirect('/article');
    }

    /**
     * 編集する
     * @param  Request $request
     * @return View
     */
    public function edit(Request $request)
    {
      return view('article/edit')->with([
        'row' => BlogArticles::find($request->id),
        'categories' => (new Category())->getList(),
        'services' => (new Service())->getList('article'),
      ]);
    }

  /**
   * 登録処理（編集）
   *
   * @param  Request $request
   * @return void
   */
    public function regist_edit(ArticleRequest $request)
    {
      (new ArticleService())->registEdit([
        'id' => $request->blog_id,
        'code' => $request->input_code,
        'title' => $request->input_title,
        'category' => $request->input_category,
        'detail' => $request->input_detail,
        'parent' => $request->input_parent,
        'rank' => $request->input_rank,
        'service' => $request->input_service,
        'status' => $request->input_status,
        'url1' => $request->input_url1,
        'url2' => $request->input_url2,
      ]);
      return redirect('/article');
    }

    /**
     * COPY作成する
     * @param  Request $request
     * @return View
     */
    public function copy(Request $request)
    {
      return view('article/copy')->with([
        'row' => BlogArticles::find($request->id),
        'categories' => (new Category())->getList(),
        'services' => (new Service())->getList('article'),
      ]);
    }
}
