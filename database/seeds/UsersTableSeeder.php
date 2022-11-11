<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'username' => 'AiMatsuda',
                'mail' => 'aimatsuda@mail.com',
                'password' => bcrypt('fuwafuwa07'),
                'bio' => 'HRI CD社員 松田です。',
                'images' => 'dawn.png',
                'created_at' => '2022-9-2 21:40:00',
                'updated_at' => '2022-9-2 21:40:00',
            ],
        ]);
    }
}
