<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //UsersTableSeederを登録
        $this->call(UsersTableSeeder::class);
        //FollowsTableSeederを登録
        $this->call(FollowsTableSeeder::class);
        //PostsTableSeederを登録
        $this->call(PostsTableSeeder::class);
    }
}
