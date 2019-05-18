@extends('layouts.app')

@section('content')

		<h1>Transactions History</h1>
		<a class="btn btn-outline-info" href="/dashboard">Back</a>
		<br>
		@if(count($transactions) > 0)
			@foreach($transactions as $transaction)		
				@if((Auth::user()->id == $transaction->depart->user_id or Auth::user()->id == $transaction->entrust->user_id) and $transaction->status == 9)
					<div class="row bg-dark text-white">
						<div class="col-sm-1">
						</div>
						<div class="col-sm-10">
							<br>
							<table class="table table-inverse">
								<tr>
									<th colspan="3" class="text-center bg-dark border-right">Traveler</th>
									<th colspan="2" class="text-center bg-dark">Entruster</th>
								</tr>
								<tr>
									<th>Name</th>
									<th>Time</th>
									<th>Destination</th>
									<th>Name</th>
									<th>Something</th>
								</tr>
								<tr>
									@if(Auth::user()->id == $transaction->depart->user_id)
									<td>You</td>
									@else
									<td><a href="/users/detail/{{$transaction->depart->user->id}}" class="text-white">{{$transaction->depart->user->name}}</a></td>
									@endif
									<td class="align-middle">{{$transaction->depart->time}}</td>
									<td class="align-middle">{{$transaction->depart->destination}}</td>
									@if(Auth::user()->id == $transaction->entrust->user_id)
									<td class="text text-danger">You</td>
									@else
									<td class="align-middle"><a href="/users/detail/{{$transaction->entrust->user->id}}" class="text-white">{{$transaction->entrust->user->name}}</a></td>
									@endif
									<td class="align-middle">{{$transaction->entrust->something}}</td>
								</tr>
							</table>	
						</div>
						<div class="col-sm-1">
						</div>
					</div>
				@endif
			@endforeach
			{{ $transactions->links() }}
		@else
		<br>
			<h3>No History Found</h3>
		@endif
@endsection