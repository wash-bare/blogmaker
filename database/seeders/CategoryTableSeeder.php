<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            [
                'code' => 'IT_WORD',
                'name' => 'ITワード',
                'major' => 'IT',
                'middle' => 'WORD',
                'minor' => '',
                'biko' => '',
            ],[
              'code' => 'FP_WORD',
              'name' => 'FPワード',
              'major' => 'FP',
              'middle' => 'WORD',
              'minor' => '',
              'biko' => '',
            ],[
              'code' => 'IT_COLUMN',
              'name' => 'ITコラム',
              'major' => 'IT',
              'middle' => 'COLUMN',
              'minor' => '',
              'biko' => '',
          ],[
            'code' => 'FP_COLUMN',
            'name' => 'FPコラム',
            'major' => 'FP',
            'middle' => 'COLUMN',
            'minor' => '',
            'biko' => '',
          ],[
              'code' => 'DIARY',
              'name' => '日記',
              'major' => 'DIARY',
              'middle' => '',
              'minor' => '',
              'biko' => '',
            ],
        ]);
    }
}
