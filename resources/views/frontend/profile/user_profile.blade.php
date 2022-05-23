@extends('frontend.main_master')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br><br>
                    <img class="card-image-top" style="border-radius: 50%"
                        src="{{ !empty($user->profile_photo_path) ? url('upload/user_images/' . $user->profile_photo_path) : url('upload/no_image.jpg') }}"
                        height="150px" width="170px"><br><br>
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
                                <strong>{{ Auth::user()->name }}</strong> Update Your Profile
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.profile.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="info-" for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control ">
                                </div>
                                <div class="form-group">
                                    <label class="info-" for="exampleInputEmail1">Email Address</label>
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control ">
                                </div>
                                <div class="form-group">
                                    <label class="info-" for="exampleInputEmail1">Phone</label>
                                    <input type="text" name="phone" value="{{ $user->phone }}" class="form-control ">
                                </div>
                                <div class="form-group">
                                    <label class="info-" for="exampleInputEmail1">User Image</label>
                                    <input type="file" name="profile_photo_path" class="form-control ">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-success">Update</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
