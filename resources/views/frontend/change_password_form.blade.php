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
            <form method="POST" action="{{ route('user.changepassword.store') }}">
                @csrf
                <div class="from-group">
                    <label class="info-title">Current Password</label>
                    <input type="password" name="current_password" id="current_password" class="from-control"/>
                </div>
                <div class="from-group">
                    <label>New Password</label>
                    <input type="password" name="password" id="password" class="from-control"/>
                </div>
                <div class="from-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="from-control"/>
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
