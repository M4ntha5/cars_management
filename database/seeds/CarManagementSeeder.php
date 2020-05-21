<?php

use Illuminate\Database\Seeder;
use App\Models\CarManagement;

class CarManagementSeeder extends Seeder
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
        factory(CarManagement::class, 1000)->create();
    }
}
