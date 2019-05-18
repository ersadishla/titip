@extends('layouts.app')

@section('content')
		<h1>Create Entrusting</h1>
		<form method="POST" action="{{ route('entrusts.store') }}">
		  @csrf
		  <div class="form-group">
		      <label for="something">Something:</label>
		      <input type="text" class="form-control" name="something" placeholder="Something that you wanna entrust(Goods, etc)" />
		  </div>
		  <div class="form-group" hidden>
		      <label for="something">Something:</label>
		      <input type="text" class="form-control" name="depart_id" value="{{$id}}" placeholder="Something that you wanna entrust(Goods, etc)" />
		  </div>		  
		  <button type="submit" class="btn btn-primary">Entrust</button>
		  <a href="/departs" class="btn btn-secondary">Back</a>
		</form>
@endsection