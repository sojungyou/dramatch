<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([ 
            // 'id' => 5,
            'user_id' => 4,
            'title' => 'タイトルです',
            'body'=> 'tekisutodesu',
            // 'created_at' => now,
            // 'updated_at' => now,
            'drama_data_id' => 3

        ]);
    }
}
