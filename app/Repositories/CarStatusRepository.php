<?php

namespace App\Repositories;

use App\Models\CarStatus;


class CarStatusRepository
{
     public function JoinStatuses(){
          $result = CarStatus::join('statuses', 'car_status.status_id', '=', 'statuses.id')
               ->select('car_status.*', 'statuses.name as status');  
          return $result;
     }
}