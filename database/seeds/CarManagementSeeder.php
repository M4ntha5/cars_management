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
        factory(CarManagement::class, 50)->create();
    }
}
