@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br><br>
                    <img class="card-image-top" style="border-radius: 50%"
                        src="{{ !empty(Auth::user()->profile_photo_path) ? url('upload/user_images/' . Auth::user()->profile_photo_path) : url('upload/no_image.jpg') }}"
                        width="170px" height="150px"><br><br>
                    <ul>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                    </ul>
                    <br>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="text-center">
                            <h3>
                                <span class="text-danger">Hi.....</span>
                                <strong>{{ Auth::user()->name }}</strong> Welcome to Your Shop
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
