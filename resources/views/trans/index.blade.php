@extends('layouts.app')

@section('content')
		<h1>Active Transaction</h1>
		<small>*Click the Name to See Profile</small>
		<br><br>
		@if(count($transactions) > 0)
		<br>
		<table class="table table-striped">
			<tr>
				<th colspan="3" class="text-center bg-dark border-right">Traveler</th>
				<th colspan="2" class="text-center bg-dark">Entruster</th>
			</tr>
			<tr>
				<th>Name</th>
				<th>Time</th>
				<th class="border-right">Destination</th>
				<th>Name</th>
				<th>Something</th>
			</tr>
			@foreach($transactions as $transaction)
				@if($transaction->status == 0)
				<tr>
					<td><a href="/users/detail/{{$transaction->depart->user->id}}" class="text-white">{{$transaction->depart->user->name}}</a></td>
					<td class="align-middle">{{$transaction->depart->time}}</td>
					<td class="align-middle border-right">{{$transaction->depart->destination}}</td>
					<td class="align-middle"><a href="/users/detail/{{$transaction->entrust->user->id}}" class="text-white">{{$transaction->entrust->user->name}}</a></td>
					<td class="align-middle">{{$transaction->entrust->something}}</td>
				</tr>
				@endif
			@endforeach
		</table>
		@else
		<br>
			<h3>No Transactions Found</h3>
		@endif
@endsection