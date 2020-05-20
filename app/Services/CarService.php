<?php

namespace App\Services;

use App\Repositories\CarRepository;
use App\Repositories\CarStatusRepository;
use App\Repositories\CarManagementRepository;

class CarService
{
     public function GetJoinedCarsList(){
          $carRepo = new CarRepository(); 
          $carStatusRepo = new CarStatusRepository();
          $carManagementRepo = new CarManagementRepository();
          
          $joinedStatuses = $carStatusRepo->JoinStatuses();

          $joinedCars = $carRepo->JoinCarStatus($joinedStatuses);

          $joinedManagemet = $carManagementRepo->JoinCarManagement($joinedCars);

          $final = $carManagementRepo->JoinUsers($joinedCars);

          return $final;
     }

}
