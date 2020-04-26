<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            // 'id' => 2,
            'post_id' => 2,
            'body' => 'tekisutodesu',
            // 'created_at'=> now,
            // 'updated_at'=> now
        ]);
    }
}
