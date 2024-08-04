<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
/**
 * ブログ記事
 */
class BlogArticles extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
      'id',
      'code',
      'title',
      'category',
      'detail',
      'parent',
      'rank',
      'service',
      'status',
      'url1',
      'url2',
      'created_at',
      'updated_at',
      'deleted'
    ];

    // ソートに使うカラムを定義
    public $sortable = [
      'code',
      'title',
      'category'.
      'parent',
      'rank',
      'service',
      'status',
      'created_at',
      'updated_at'
    ];

    /**
     * 記事コード採番
     * @return $code
     */
    public function getNewCode()
    {
      $count = 0;
      $data = self::select('id')
      ->where('deleted', 0)
      ->get();
      if (!empty($data)) {
        $count = $data->count();
      }
      return sprintf('%04d', $count + 1);
    }
}
