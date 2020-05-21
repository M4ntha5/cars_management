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

          $raw = DB::raw('select p1.date_to, p1.car_id, p1.id FROM car_management p1
               left outer join car_management p2 
               on (p1.car_id = p2.car_id and p1.date_to < p2.date_to)         
               where p2.id is null
               order by id');

          $sql = '(' . $raw . ') as latest';

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
          ->paginate(10);
          
          return $result;
     }

     public function JoinPastUsers(){
          $join = CarManagement::select('car_id', DB::raw('max(id) id'))
               ->where(function($query){
                    $query->where('id', '<', DB::raw('(select max(date_to) from `car_management`)'));
               })
               ->groupBy('car_id');
          
          $sql = '(' . $join->toSql() . ') as latest';

          $result = CarManagement::join(DB::raw($sql), function($join) {
               $join->on('car_management.car_id', 'latest.car_id')
                    ->on('car_management.id', 'latest.id');
          })
          ->join('users', 'car_management.user_id', '=', 'users.id')
          ->join('segments', 'car_management.segment_id', '=', 'segments.id')
          ->select('segments.name as pastUserSegment', 'users.name as pastUserName', 'car_management.car_id')
          ->paginate(10);

          return $result;
     }
}