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
        ini_set('memory_limit', '512M');
        DB::disableQueryLog();
        factory(CarStatus::class, 1000)->create();
    }
}
