@extends('layouts.app')

@section('content')
     <h1 class="pt-3" style="text-align:center;">Cars</h1>
     <div class="container">
          <div class="row justify-content-center">
               <table class="table">
                    <thead>
                         <tr>
                              <th scope="col">#</th>
                              <th scope="col">Number</th>
                              <th scope="col">Year</th>
                              <th scope="col">Model</th>
                              <th scope="col">Car status</th>
                              <th scope="col">Past owner</th>
                              <th scope="col">Current owner</th>
                         </tr>
                    </thead>
                    @foreach($cars as $car)             
                         <tbody>
                              <tr>
                                   <th scope="row">{{$car->id}}</th>
                                   <td>{{$car->number}}</td>
                                   <td>{{$car->year_made}}</td>
                                   <td>{{$car->model}}</td>
                              </tr>
                         </tbody>
                    @endforeach
               </table>
               {{$cars->links()}}
          </div>       
     </div>
@endsection