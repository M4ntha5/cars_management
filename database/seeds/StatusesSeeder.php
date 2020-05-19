<?php

use Illuminate\Database\Seeder;
use App\Models\Statuses;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Statuses::class, 50)->create();
    }
}
