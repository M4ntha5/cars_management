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
        $this->call([
            StatusesSeeder::class,
            SegmentSeeder::class,
            UserSeeder::class,
            CarSeeder::class,
            CarManagementSeeder::class,
            CarStatusSeeder::class,
        ]);
    }
}
