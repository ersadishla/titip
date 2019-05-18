@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
            <div class="row">
                <a href="/departs/create" class="btn btn-primary mr-auto">Wanna Go Somewhere</a>    

                @if(Auth::user()->prof_image == 'noimage.jpg')
                <a href="/profile" class="btn btn-primary ml-auto">Update Photo</a>
                @endif 
            </div>    
            </div>
            <br>
            <div class="card  bg-dark">
                
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="container">
                        <h3>Transactions</h3>
                        <table class="table table-striped">
                        <a class="btn btn-outline-success" href="/transactions/history">History</a>
                        @if (count($transactions) > 0)
                            @if(count($departs) > 0)                                
                                <tr>
                                    <th>Time</th>
                                    <th>Destination</th>
                                    <th>Entruster</th>
                                    <th>Something</th>
                                    <th>Action</th>
                                </tr>                                                                                                                          
                                @foreach($transactions as $transaction)
                                    @foreach($departs as $depart)
                                        @if($depart->id == $transaction->depart_id and $transaction->status == 0)
                                        <tr>
                                            <td>{{$depart->time}}</td>
                                            <td>{{$depart->destination}}</td>
                                            <td><a href="/users/detail/{{$transaction->entrust->user->id}}" class="text-white">{{$transaction->entrust->user->name}}</a></td>
                                            <td>{{$transaction->entrust->something}}</td>
                                            <td>                           
                                                <a class="btn btn-outline-danger" href="/transactions/deleted/{{$transaction->id}}">Have Done</a>
                                            </td>                   
                                        </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endif
                        @endif
                        </table>

                        <h3>EntrusThing</h3>
                        <table class="table table-striped">
                        @if(count($entrusts) > 0)
                            <tr>
                                <th>Something</th>
                                <th>To</th>
                                <th>Destination</th>
                                <th>Status</th>
                            </tr>
                            @foreach($entrusts as $entrust)
                                @foreach($transactions as $transaction)
                                    @if($entrust->id == $transaction->entrust_id)
                                    <tr>
                                        <td>{{$entrust->something}}</td>
                                        <td><a href="/users/detail/{{$transaction->depart->user->id}}" class="text-white">{{$transaction->depart->user->name}}</a></td>
                                        <td>{{$transaction->depart->destination}}</td>
                                        @if($transaction->depart->arrived == 0)
                                        <td>Still Outside</td>
                                        @elseif($transaction->depart->arrived == 1)
                                        <td>On The Way To Your Places</td>
                                        @endif
                                    </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        @endif
                        </table>


                        <h3>Departure</h3>
                        <table class="table table-striped">
                        <a class="btn btn-outline-success" href="/departs/history">History</a>
                        @if(count($departs) > 0)
                        <tr>
                            <th>Time</th>
                            <th>Destination</th>
                            <th colspan="2">Action</th>
                        </tr>                                                            
                            @foreach($departs as $depart)
                            @if($depart->arrived != 9)
                                <tr>
                                    <td>{{$depart->time}}</td>
                                    <td>{{$depart->destination}}</td>
                                    <td>
                                    <a class="btn btn-outline-info" href="{{route ('departs.edit',$depart->id)}}">Edit</a>
                                    </td>
                                    <td>
                                    @if($depart->arrived == 0)                                    
                                        <a class="btn btn-outline-success" href="/departs/arrived/{{$depart->id}}">Arrived</a>
                                    @endif
                                    </td>                     
                                </tr>
                                @if($depart->arrived == 1)
                                <tr>
                                    <td colspan="3" class="text-danger">If You Already Delivered All the EntrusThing, CLICK the Button</td>
                                    <td>                                 
                                        <a class="btn btn-outline-danger" href="/departs/deleted/{{$depart->id}}">Have Done</a>
                                    </td>
                                </tr>
                                @endif
                            @endif
                            @endforeach
                        @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
