<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarManagement extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date_from', 'date_to', 'car_id', 'segment_id', 'user_id'
    ];

    protected $table = 'car_management';

}
