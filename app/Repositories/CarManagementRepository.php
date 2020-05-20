<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\CarManagement;

class CarManagementRepository
{
     public function JoinCarManagement($joined){
          $result = CarManagement::join('segments', 'car_management.segment_id', '=', 'segments.id')
               ->joinSub($joined, 'cars', function($join){
                    $join->on('car_management.car_id', '=', 'cars.id')->latest('car_management.date_to');
               })
               ->select('cars.*', 'car_management.id as managmentId', 
                    'car_management.date_to','car_management.user_id', 
                    'segments.name as currentUserSegment'); 
          return $result;
     }   

     public function JoinUsers($joined){
          $join = CarManagement::select('car_id', DB::raw('max(id) id'))->groupBy('car_id');


          $sql = '(' . $join->toSql() . ') as latest';

          $result = CarManagement::join(DB::raw($sql), function($join) {
               $join->on('car_management.car_id', 'latest.car_id')
               ->on('car_management.id', 'latest.id');
          })
          ->joinSub($joined, 'cars', function($join){
               $join->on('car_management.car_id', '=', 'cars.id')->latest('car_management.date_to');
          })
          ->join('users', 'car_management.user_id', '=', 'users.id')
          ->join('segments', 'car_management.segment_id', '=', 'segments.id')
          ->select('cars.*', 'segments.name as currentUserSegment', 'users.name as currentUserName')
          ->get();
          return $result;
     }
}