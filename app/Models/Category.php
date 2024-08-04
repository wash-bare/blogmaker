<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * カテゴリ
 */
class Category extends Model
{
    // use HasFactory;
    protected $table = 'category';
    /**
     * リスト取得
     * @return $array
     */
    public function getList()
    {
      $array = [];
      $data = self::select('code', 'name')
      ->where('deleted', 0)
      ->get();
      if (!empty($data)) {
        $array = $data->toArray();
      }
      return $array;
    }
}
