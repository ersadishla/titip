@extends('layouts.app')

@section('content')
<center>
<div class="card" style="width: 400px">
   <div class="profile-header-img">
        <img style="width : 300px" src="{{ asset('storage/prof_images/' . $user->prof_image) }}" class="figure-img" alt="Profile Image">
        
        <div class="rank-label-container text-center">
            <span class="label label-default rank-label">{{$user->name}}</span>
        </div>
    </div>
    <div class="card-body">
        <form action="/profile" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" class="form-control-file text-center" name="prof_image" id="proFile" aria-describedby="fileHelp">

                <small id="fileHelp" class="form-text text-muted">Please upload a Formal Picture (4x6 or 3x4)
                </small>
                <small id="fileHelp" class="form-text text-muted">Size of image should not be more than 2MB.</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/dashboard" class="btn btn-secondary">Skip</a>
        </form>
        <br>
        </div>
    </div>
    </div>
</center>
		
	
@endsection

/profile