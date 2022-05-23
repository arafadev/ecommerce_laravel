@extends('admin.admin-master')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Update Password</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{ route('update.change.password') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <h5>Current Password</h5>
                                        <div class="controls">
                                            <input type="password" name="oldpassword" id="current_password"
                                                class="form-control" required=""
                                                data-validation-required-message="This field is required">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>New Password</h5>
                                        <div class="controls">
                                            <input type="password" name="password" id="password" class="form-control"
                                                required="" data-validation-required-message="This field is required">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Confirm Password</h5>
                                        <div class="controls">
                                            <input type="password" name="password_confirmation" id="password_confirmation"
                                                class="form-control" required=""
                                                data-validation-required-message="This field is required">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="Change Password" class="btn btn-rounded btn-bitbucket">
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
