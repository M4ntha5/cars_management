<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\CarStatus;

class CarStatusRepository
{
     public function JoinStatuses(){

          //here tried to get only newest car_status, but no cigar
          /*$raw = DB::raw('select p1.car_id, p1.id, p1.status_id
               FROM car_status p1        
               left outer join car_status p2 
               on (p1.status_id = p2.status_id and p1.date_to < p2.date_to)
               where p2.id is null
               order by id');

          $sql = '(' . $raw . ') as latest';
          
*/
         // dd($result); 

         //simple join without dates here
          $result = CarStatus::join('statuses', 'car_status.status_id', '=', 'statuses.id')
               ->select('car_status.*', 'statuses.name as status');
          return $result;
     }
}