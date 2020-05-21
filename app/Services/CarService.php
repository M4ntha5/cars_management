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
          
          //joining statuses on car_status
          $joinedStatuses = $carStatusRepo->JoinStatuses();
          //joining cars on car_status
          $joinedCars = $carRepo->JoinCarStatus($joinedStatuses);
          //joining car_status on car_management
          $joinedManagemet = $carManagementRepo->JoinCarManagement($joinedCars);
          //joining users and segments on car_management
          $cars = $carManagementRepo->JoinUsers($joinedCars);
          //joining past users and segments on car_management
          $pastUsers = $carManagementRepo->JoinPastUsers();
          //putting everything to one list
          for($i=0;$i<count($cars);$i++)
               for($j=0;$j<count($pastUsers);$j++)
                    if($cars[$i]->id == $pastUsers[$j]->car_id){
                         $cars[$i]['pastUserName'] = $pastUsers[$j]->pastUserName;
                         $cars[$i]['pastUserSegment'] = $pastUsers[$j]->pastUserSegment;
                    }


          return $cars;
     }

}
