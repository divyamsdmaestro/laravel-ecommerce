@extends('frontend.front_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="col-md-2">
          <img class="card-img-top" src="{{ !empty($user->profile_photo_path)?url('upload/user_profile/'.$user->profile_photo_path):url('upload/no_image.png') }}" width="100%" height="100%"/>
          <ul class="list-group list-group-flush">
              <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
              <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
              <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
              <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
          </ul>
        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-6">
               <marquee><h1>Hi...<strong>{{ Auth::user()->name }}</strong> Update Profile!</h1></marquee>
        
        <div class="card-body">
            <form method="GET" action="{{ route('user.profilestore') }}" enctype="multipart/form-data">
                @csrf
                <div class="from-group">
                    <label class="info-title">Name</label>
                    <input type="text" name="name" class="from-control" value="{{ $user->name }}"/>
                </div>
                <div class="from-group">
                    <label>Email</label>
                    <input type="email" name="email" class="from-control" value="{{ $user->email }}"/>
                </div>
                <div class="from-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="from-control" value="{{ $user->phone }}"/>
                </div>
                <div class="from-group">
                    <label>Profile Image</label>
                    <input type="file" name="profile_photo_path" class="from-control" value="{{ $user->profile_photo_path }}"/>
                </div>
                <div class="from-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="submit"/>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>

@endsection
