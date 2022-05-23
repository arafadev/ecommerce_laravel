@extends('admin.admin-master')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Edit Profile</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <h5>Email</h5>
                                        <div class="controls">
                                            <input type="email" name="email" value="{{ $editData->email }}"
                                                class="form-control" required=""
                                                data-validation-required-message="This field is required">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <h5>Username</h5>
                                        <div class="controls">
                                            <input type="name" name="name" value="{{ $editData->name }}"
                                                class="form-control" required=""
                                                data-validation-required-message="This field is required">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <h5>Image</h5>
                                        <div class="controls">
                                            <input type="file" id="image" name="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <img class="rounded-circle mb-4" id="showImage"
                                            src="{{ !empty($editData->profile_photo_path) ? url('upload/admin_images/' . $editData->profile_photo_path) : url('upload/no_image.jpg') }}"
                                            alt="User Avatar" width="100px" height="100px">
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" name="Update">
                                    </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
