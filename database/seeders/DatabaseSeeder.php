<?php

namespace Database\Seeders;

use App\Models\PostComment;
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
        $this->call([
            CategorySeeder::class,
            //PostSeeder::class,
            //PostImageSeeder::class,
            RolSeeder::class,
            UserSeeder::class,
            ContactSeeder::class,
            PostCommentSeeder::class,
            TagSeeder::class,
        ]);
    }
}