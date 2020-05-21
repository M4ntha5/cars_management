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

          $cars = $carManagementRepo->JoinUsers($joinedCars);

          $pastUsers = $carManagementRepo->JoinPastUsers();

          for($i=0;$i<count($cars);$i++)
               for($j=0;$j<count($pastUsers);$j++)
                    if($cars[$i]->id == $pastUsers[$j]->car_id){
                         $cars[$i]['pastUserName'] = $pastUsers[$j]->pastUserName;
                         $cars[$i]['pastUserSegment'] = $pastUsers[$j]->pastUserSegment;
                    }


          return $cars;
     }

}
