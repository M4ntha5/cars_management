<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;


use App\Models\Car;

class CarRepository
{
     public function JoinCarStatus($joined){
          $result = Car::joinSub($joined, 'car_status', function($join){
               $join->on('cars.id', '=', 'car_status.car_id');
          })->select('cars.id','cars.number','cars.year_made','cars.model', 'car_status.status');
          return $result;
     }

}
