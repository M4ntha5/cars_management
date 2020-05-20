@extends('layouts.app')

@section('content')
     <h1 class="pt-3" style="text-align:center;">Cars list</h1>
     <div class="container">
          <div class="row justify-content-center">
               <table class="table">
                    <thead>
                         <tr>
                              <th scope="col">Number</th>
                              <th scope="col">Year made</th>
                              <th scope="col">Model</th>
                              <th scope="col">Car status</th>
                              <th scope="col">Current owner name / segment</th>
                              <th scope="col">Past owner name / segment</th>
                         </tr>
                    </thead>
                    @foreach($cars as $car)             
                         <tbody>
                              <tr>
                                   <td>{{$car->number}}</td>
                                   <td>{{$car->year_made}}</td>
                                   <td>{{$car->model}}</td>
                                   <td>{{$car->status}}</td>
                                   <td>{{$car->currentUserName}} / {{$car->currentUserSegment}}</td>
                              </tr>
                         </tbody>
                    @endforeach
               </table>
               
          </div>       
     </div>
@endsection