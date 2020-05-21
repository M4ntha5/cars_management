<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CarService;
use App\Repositories\CarManagementRepository;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $carService = new CarService(); 

        $cars = $carService->GetJoinedCarsList();

        return view('cars')->with('cars', $cars);
    }
}
