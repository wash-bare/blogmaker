<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service')->insert([
            [
                'kubun' => 'blog',
                'code' => 'Ameba',
                'name1' => 'アメーバ',
                'name2' => 'アメブロ',
                'biko' => '',
            ],[
                'kubun' => 'blog',
                'code' => 'Hatena',
                'name1' => 'はてな',
                'name2' => 'はてブロ',
                'biko' => '',
            ],[
                'kubun' => 'blog',
                'code' => 'FC2',
                'name1' => 'FC2ブログ',
                'name2' => 'FC2',
                'biko' => '',
            ],[
                'kubun' => 'blog',
                'code' => 'WP',
                'name1' => 'WordPress',
                'name2' => 'WORDPRESS',
                'biko' => '',
            ],[
                'kubun' => 'pdf',
                'code' => 'pdf',
                'name1' => 'PDFファイル',
                'name2' => 'PDF',
                'biko' => '',
            ],
        ]);
    }
}
