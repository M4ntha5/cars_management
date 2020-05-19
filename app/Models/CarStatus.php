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
        'cars_id', 'status_id', 'date_from', 'date_to'
    ];  
    
    protected $table = 'car_status';

    public function statuses()
    {
        return $this->hasMany('statuses');
    }
    public function cars()
    {
        return $this->hasMany('car');
    }
}