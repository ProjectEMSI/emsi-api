<?php

namespace Database\Seeders;

use App\Models\Content\Article;
use App\Models\Content\Short;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);

        Article::factory(50)->create();
        Short::factory(50)->create();

        // \App\Models\User::factory(10)->create();
    }
}
