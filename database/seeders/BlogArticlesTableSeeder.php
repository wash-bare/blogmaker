<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_articles')->insert([
          [
            'code' => 'WorkBreakdownStructure',
            'title' => '作業分解構造(WBS)',
            'category' => 'IT_WORD',
            'detail' => 'プロジェクトのスケジュール管理に使われるツールの1つ。',
            'parent' => 'WP0001',
            'rank' => 'A',
            'service' => 'WP',
            'status' => 'A',
            'url1' => '',
            'url2' => '',
          ],
          [
            'code' => 'WP0001',
            'title' => 'AWSサーバ構築',
            'category' => '',
            'detail' => '',
            'parent' => '',
            'rank' => 'C',
            'service' => 'WP',
            'url1' => '',
            'url2' => '',
          ],
          [
            'code' => 'FC201',
            'title' => '確定申告の注意点',
            'category' => '',
            'detail' => '',
            'parent' => '',
            'rank' => 'C',
            'service' => 'FC2',
            'url1' => '',
            'url2' => '',
          ],
          [
            'code' => 'Ameba01',
            'title' => '草むしり検定３級にチャレンジ',
            'category' => '',
            'detail' => '',
            'parent' => '',
            'rank' => '',
            'service' => 'Ameba',
            'url1' => '',
            'url2' => '',
          ],
        ]);
    }
}
