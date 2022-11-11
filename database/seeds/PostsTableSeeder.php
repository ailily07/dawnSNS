<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
            [
                'user_id' => '1',
                'posts' => 'user_id=1 のつぶやいた内容を表示します。',
            ],
            [
                'user_id' => '2',
                'posts' => 'user_id=2 のつぶやいた内容を表示します。',
            ],
            [
                'user_id' => '3',
                'posts' => 'user_id=3 のつぶやいた内容を表示します。',
            ],
            [
                'user_id' => '4',
                'posts' => 'user_id=4 のつぶやいた内容を表示します。',
            ],
            [
                'user_id' => '5',
                'posts' => 'user_id=5 のつぶやいた内容を表示します。',
            ],
            [
                'user_id' => '6',
                'posts' => 'user_id=6 のつぶやいた内容を表示します。',
            ],
            [
                'user_id' => '7',
                'posts' => 'user_id=7 のつぶやいた内容を表示します。',
            ],
        ]);
    }
}
