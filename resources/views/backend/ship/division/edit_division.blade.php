@extends('admin.admin-master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <br>
    <div class="container-full ">


        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Division</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">


                        <form method="post" action="{{ route('division.update', $division->id) }}">
                            @csrf


                            <div class="form-group">
                                <h5>Division Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="division_name" value="{{ $division->division_name }}"
                                        class="form-control">
                                    @error('division_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                            </div>
                        </form>





                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>




    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->

    </div>
@endsection
