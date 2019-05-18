@extends('layouts.app')

@section('content')
<center>
	<div class="card bg-dark" style="width:400px">
	    <img class="card-img-top p-3" src="{{ asset('storage/prof_images/' . $user->prof_image) }}" alt="Profile Image" style="width:100%">
	    <div class="card-body">
			<h4 class="card-title">{{$user->name}}</h4>
			<table class="table table-dark table-striped">
				<tr>
					<td>Room</td>	
					<td colspan="2">: {{$user->room}}</td>
				</tr>
				<tr>
					<td>Department</td>
					<td colspan="2">: {{$user->department}}</td>
				</tr>
				<tr>
					<td>Back To</td>
					<td>
						<a href="/transactions" class="btn btn-primary">Transactions</a>
					</td>
					<td>
						<a href="/dashboard" class="btn btn-primary">Dashboard</a>
					</td>
				</tr>
			</table>
	    </div>
  	</div>
</center>
@endsection
