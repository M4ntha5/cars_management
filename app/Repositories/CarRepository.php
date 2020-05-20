<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;


use App\Models\Car;
/*use App\Models\CarStatus;
use App\Models\Statuses;
use App\Models\Segment;
use App\Models\User;
use App\Models\CarManagement;*/

class CarRepository
{
     public function JoinCarStatus($joined){
          $result = Car::joinSub($joined, 'car_status', function($join){
               $join->on('cars.id', '=', 'car_status.car_id');
          })->select('cars.id','cars.number','cars.year_made','cars.model', 'car_status.status');
          return $result;
     }

   /*  public function JoinCarStatus2(){

          $joinedStatuses = CarStatus::join('statuses', 'car_status.status_id', '=', 'statuses.id')
               ->select('car_status.*', 'statuses.name as status');                     

          $joinOnCars = Car::joinSub($joinedStatuses, 'car_status', function($join){
                    $join->on('cars.id', '=', 'car_status.car_id');
               })->select('cars.id','cars.number','cars.year_made','cars.model', 'car_status.status');
     
          $joinOnManagemet = CarManagement::join('segments', 'car_management.segment_id', '=', 'segments.id')
               ->joinSub($joinOnCars, 'cars', function($join){
                    $join->on('car_management.car_id', '=', 'cars.id')->latest('car_management.date_to');
               })
               ->select('cars.*', 'car_management.id as managmentId', 
                         'car_management.date_to','car_management.user_id', 
                         'segments.name as currentUserSegment');
                      

          $join = CarManagement::select('car_id', DB::raw('max(id) id'))->groupBy('car_id');
          $sql = '(' . $join->toSql() . ') as latest';

          $carManage = CarManagement::join(DB::raw($sql), function($join) {
               $join->on('car_management.car_id', 'latest.car_id')
               ->on('car_management.id', 'latest.id');
          })
          ->joinSub($joinOnCars, 'cars', function($join){
               $join->on('car_management.car_id', '=', 'cars.id')->latest('car_management.date_to');
          })
          ->join('users', 'car_management.user_id', '=', 'users.id')
          ->join('segments', 'car_management.segment_id', '=', 'segments.id')
          ->select('cars.*', 'segments.name as currentUserSegment', 'users.name as currentUserName')
          ->get();


          //dd($carManage);

          return $carManage;
     }*/

}
