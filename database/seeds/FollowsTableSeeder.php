<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('follows')->insert([
            [
                'follow_id' => '1',
                'follower_id' => '2',
            ],
            [
                'follow_id' => '1',
                'follower_id' => '3',
            ],
            [
                'follow_id' => '1',
                'follower_id' => '4',
            ],
            [
                'follow_id' => '2',
                'follower_id' => '1',
            ],
            [
                'follow_id' => '3',
                'follower_id' => '1',
            ],
            [
                'follow_id' => '4',
                'follower_id' => '1',
            ],
            [
                'follow_id' => '5',
                'follower_id' => '1',
            ],
            [
                'follow_id' => '6',
                'follower_id' => '1',
            ],
            [
                'follow_id' => '7',
                'follower_id' => '1',
            ],
            [
                'follow_id' => '8',
                'follower_id' => '1',
            ],
            [
                'follow_id' => '9',
                'follower_id' => '1',
            ],
        ]);
    }
}
