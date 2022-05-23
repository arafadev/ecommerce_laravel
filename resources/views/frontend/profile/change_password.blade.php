@extends('frontend.main_master')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

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
                    <div class="card"><br>
                        <div class="text-center">
                            <h3>
                                    <span class="text-danger">Change Passwod</span>
                            </h3><br><br>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.update.password') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="info-" for="exampleInputEmail1"> Cruuent password</label>
                                    <input type="password" name="oldpassword" id="current_password"  class="form-control ">
                                </div>
                                <div class="form-group">
                                    <label class="info-" for="exampleInputEmail1" >New Password</label>
                                    <input type="password" name="password" id="password"  class="form-control ">
                                </div>
                                <div class="form-group">
                                    <label class="info-" for="exampleInputEmail1"> Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control ">
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
