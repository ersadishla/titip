@extends('layouts.app')

@section('content')
	<h1>Edit Departure</h1>
	<form method="POST" action="{{ route('departs.update', $depart->id) }}">
		@method('PATCH')  
		@csrf
		<div class="form-group">	
			<label for="time">Time:</label>
          	<input type="text" class="form-control" name="time" value={{ $depart->time }} />
		</div>
		<div class="form-group">
			<label for="destination">Destination:</label>
          	<input type="text" class="form-control" name="destination" value={{ $depart->destination }} />
		</div>
		<button type="submit" class="btn btn-primary">Edit</button>
		<a href="/" class="btn btn-secondary">Back</a>
	</form>
@endsection
