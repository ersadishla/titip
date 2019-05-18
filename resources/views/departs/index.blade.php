@extends('layouts.app')

@section('content')
		<h1>Active Departure</h1>
		<a href="/departs/create" class="btn btn-primary mr-auto">Wanna Go Somewhere</a> 
		<br><br>
		@if(count($departs) > 0)
			@foreach($departs as $depart)
			@if($depart->arrived == 0)
			<div class="row bg-dark text-white">
				<div class="col-sm-3">
					<br>
					<center><img class="img-thumbnail" src="{{ asset('storage/prof_images/' . $depart->user->prof_image) }}" alt="Profile Image" style="height:250px"></center>
				</div>
				<div class="col-sm-6">
					<br>
					<h4 class="card-title">{{$depart->user->name}}</h4>
					<table class="table table-inverse">
						<tr>
							<td>Room</td>	
							<td>: {{$depart->user->room}}</td>
						</tr>
						<tr>
							<td>Department</td>
							<td>: {{$depart->user->department}}</td>
						</tr>
						<tr>
							<td>Goto</td>
							<td>: {{$depart->destination}}</td>
						</tr>
						<tr>
							<td>At</td>
							<td>: {{$depart->time}}</td>
						</tr>
					</table>
					@if(Auth::user()->id != $depart->user_id)
					<a class="btn btn-success" href="/entrusts/create/{{$depart->id}}">Entrust</a>
					@endif	
				</div>
				<div class="col-sm-3">
					<br><br><br><br><br><br><br><br><br><br><br>
					@auth
						@if(Auth::user()->id == $depart->user_id)
							<div>
								<a class="btn btn-outline-info" href="{{route ('departs.edit',$depart->id)}}">Edit</a>
								<a class="btn btn-outline-success" href="/departs/arrived/{{$depart->id}}">Arrived</a>
							</div>
						@endif
					@endauth
					<br>
				</div>
			</div>
			@endif
			@endforeach
			{{$departs->links()}}
		@else
		<br>
			<h3>No departs Found</h3>
		@endif
@endsection