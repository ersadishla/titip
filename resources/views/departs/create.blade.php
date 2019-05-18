@extends('layouts.app')

@section('content')
	<h1>Create Departure</h1>
	<form method="POST" action="{{ route('departs.store') }}">
		@csrf
		<div class="form-group">
		  <label for="time">Time:</label>
		  <input type="text" class="form-control" name="time" placeholder="19:00:00" />
		</div>
		<div class="form-group">
		  <label for="destination">Destination:</label>
		  <input type="text" class="form-control" name="destination"/>
		</div>
		<button type="submit" class="btn btn-primary">Add</button>
		<a href="/dashboard" class="btn btn-secondary">Back</a>
	</form>
@endsection