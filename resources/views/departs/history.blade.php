@extends('layouts.app')

@section('content')

		<h1>Departure History</h1>
		<a class="btn btn-outline-info" href="/dashboard">Back</a>
		<br>
		@if(count($departs) > 0)
			@foreach($departs as $depart)
				@if(Auth::user()->id == $depart->user_id and $depart->arrived == 9)

					<div class="row bg-dark text-white">
						<div class="col-sm-1">
						</div>
						<div class="col-sm-10">
							<br>
							<h4 class="card-title">{{$depart->user->name}}</h4>
							<table class="table table-inverse">
								<tr>
									<td>Goto</td>
									<td>: {{$depart->destination}}</td>
								</tr>
								<tr>
									<td>At</td>
									<td>: {{$depart->time}}</td>
								</tr>
							</table>	
						</div>
						<div class="col-sm-1">
						</div>
					</div>
				@endif
			@endforeach
			{{$departs->links()}}
		@else
		<br>
			<h3>No History Found</h3>
		@endif
@endsection