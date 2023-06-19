<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'username' => 'tester',
            'email' => 'tester@tester',
            'password' => Hash::make('tester123'),
            'isAdmin' => 1
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'username' => 'jake',
            'email' => 'jake@jake',
            'password' => Hash::make('jake123')
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'username' => 'peter',
            'email' => 'peter@peter',
            'password' => Hash::make('peter123')
        ]);

        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => 'Tester`s Post',
        //     'body' => 'My first post as Tester!',
        //     'created_at' => date("Y-m-d H:i:s")
        // ]);

        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'title' => 'Tester`s Post 2',
        //     'body' => 'My second post as Tester!',
        //     'created_at' => date("Y-m-d H:i:s")
        // ]);

        // DB::table('posts')->insert([
        //     'user_id' => 2,
        //     'title' => 'Jake`s Post',
        //     'body' => 'My first post as Jake!',
        //     'created_at' => date("Y-m-d H:i:s")
        // ]);

        DB::table('follows')->insert([
            'user_id' => 2,
            'followeduser' => 1
        ]);

        DB::table('follows')->insert([
            'user_id' => 3,
            'followeduser' => 1
        ]);

        DB::table('follows')->insert([
            'user_id' => 3,
            'followeduser' => 2
        ]);
    }
}
