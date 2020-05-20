<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarStatus extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'car_id', 'status_id', 'date_from', 'date_to'
    ];  
    
    protected $table = 'car_status';

}