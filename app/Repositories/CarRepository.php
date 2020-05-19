<?php

namespace App\Repositories;

use App\Models\Car;

class CarRepository
{
     public static function GetAllCars()
     {
         return Car::orderBy('id', 'asc')->paginate(10);
     }
}
