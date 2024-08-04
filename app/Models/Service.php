<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * サービス
 */
class Service extends Model
{
    // use HasFactory;
    protected $table = 'service';
    /**
     * リスト取得
     * @param string $kubun
     * @return $array
     */
    public function getList($kubun)
    {
      $array = [];
      $data = self::select('code', 'name1', 'name2')
      ->where('kubun', $kubun)
      ->where('deleted', 0)
      ->get();
      if (!empty($data)) {
        $array = $data->toArray();
      }
      return $array;
    }
}
