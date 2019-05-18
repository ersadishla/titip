@extends('layouts.app')

@section('content')
		<h1>Active Departure</h1>
		<a href="/departs/create" class="btn btn-primary mr-auto">Wanna Go Somewhere</a> 
		<br><br>
		@if(count($departs) > 0)

		<table class="table table-inverse">
			<th>
				<td>Name</td>
				<td>Room</td>
				<td>Department</td>
				<td>Goto</td>
				<td>At</td>
				<td>Admin</td>	
			</th>
			@foreach($departs as $depart)
				<tr>
					<td><center><img class="img img-fluid" src="{{ asset('storage/prof_images/' . $depart->user->prof_image) }}" alt="Profile Image" style="height:100px"></center></td>
					<td>{{$depart->user->name}}</td>
					<td>{{$depart->user->room}}</td>
					<td>{{$depart->user->department}}</td>
					<td>{{$depart->destination}}</td>
					<td>{{$depart->time}}</td>
					@if($depart->arrived == 9)
					<td>
					<form action="{{ route('departs.destroy', $depart->id)}}" method="POST">
					@csrf
					@method('DELETE')
					<button class="btn btn-outline-danger" type="submit">Delete</button>
					</form>	
					</td>
					@else
					<td></td>
					@endif
				</tr>	
			@endforeach
		</table>

		{{$departs->links()}}
		@else
		<br>
			<h3>No departs Found</h3>
		@endif
@endsection