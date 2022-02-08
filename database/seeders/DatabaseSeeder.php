<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Truncate
        User::truncate();
        Book::truncate();
        Author::truncate();
        Publisher::truncate();
        Genre::truncate();

        // Seeder
        User::factory(50)->create();
        Author::factory(200)->create();
        Publisher::factory(100)->create();
        Genre::factory(50)->create();
        Book::factory(400)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
