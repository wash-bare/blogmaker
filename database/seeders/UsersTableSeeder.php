<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
          ['name' => 'Araiguma', 'email' => 'araiguma@yahoo.com'],
          ['name' => 'テスト　太郎', 'email' => 'taro1@yahoo.com'],
          ['name' => 'テスト　次郎', 'email' => 'taro2@yahoo.com'],
          ['name' => 'テスト　三郎', 'email' => 'taro3@yahoo.com'],
        ];

        foreach ($rows as $row) {
          DB::table('users')->insert([
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'created_at' => date('Y-m-d H:i:s'),
          ]);
        }/*endforeach*/

        // 最初にseederしたadminユーザに管理者権限つける
        DB::table('users')
        ->where('id', 1)
        ->update(['authority_type' => 1]);
    }
}
