@extends('layouts.app')

@section('content')

  
   <div class="container">
     <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                         <img src="/assets\images\iphone.jpg" width="300" height="250">
                        </div>
                        <div class="col-sm-6">
                            <h4 class="alert alert-success">Iphone</h4>
                            <ul class="list-unstyled">
                                <li class="badge bg-danger p-2" style="font-size: medium;"> Iphone 14 pro</li>
                                <li class="p-2"> <h4>Color</h4> </li>
                                <li class="p-2"> <small>Address Jeddah Khaled ibn Alawalid St</small> </li>
                            </ul>
                        </div>
                        <div class="col-sm-3">
                            <ul class="list-unstyled p-2">
                                <li class="badge bg-success " style="font-size: medium;"> price :3500</li>
                                <li class=""> <span>Tax : 15%</span> </li>
                                <li class=""> <small>Total </small> </li>
                                <li class=""> <small><p>السعر الأصلي: <del>100 ريال</del></p> </small> </li>
                                <li class=""> <small>Net </small> </li>
                               
                            </ul>
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-primary">Show Details >></button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
     </div>
   </div>

@endsection