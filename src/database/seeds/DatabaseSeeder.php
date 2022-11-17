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
        $this->call(UserSeeder::class);
        $this->call(StudyContentSeeder::class);
        $this->call(StudyLanguageSeeder::class);
        $this->call(StudyTimeSeeder::class);
    }
}
