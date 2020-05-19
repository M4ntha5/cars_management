<?php

use Illuminate\Database\Seeder;
use App\Models\CarStatus;

class CarStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CarStatus::class, 50)->create();
    }
}
