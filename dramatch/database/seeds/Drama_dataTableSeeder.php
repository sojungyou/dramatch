<?php

use Illuminate\Database\Seeder;

class Drama_dataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drama_data')->insert([
            // 'id' => 3,
            'title' => 'タイトルです',
            'story' => 'storydesu',
            'image_path' => 'image'
            // 'created_at' => now,
            // 'updated_at' => now
        ]);
    }
}
