<?php

namespace App\Utility;

/**
 * 文字列変換ユーティリティ
 */
class StrConv
{
    /**
     * 記事のURLを編集
     */
    static function editArticleUrl($code)
    {
        $num = intVal($code);
        $folder = '0000';
        if ($num < 101) {
            $folder = '0100';
        } elseif ($num < 201) {
            $folder = '0200';
        }
        $url = 'http://localhost/shared/Articles/'.$folder.'/'.$code.'.html';
        return $url;
    }

    static function editUrl($filename)
    {
        return 'http://localhost/shared/pdf/'.$filename;
    }
}
