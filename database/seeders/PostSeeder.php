<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'id' => 1,
            'title' => '洋服',
            'kyapusyon' => '説明',
            'hat' => '帽子',
            'tops' => '上着',
            'pants' => 'ズボン',
            'shoes' => '靴',
            'accessories' => '指輪',
        ]);
    }
}