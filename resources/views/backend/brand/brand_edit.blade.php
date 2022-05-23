@extends('admin.admin-master')
@section('content')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Brand</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('brand.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Brand Name English</h5>
                                                <div class="controls">
                                                    <input type="text" name="brand_name_en"
                                                        value="{{ $brand->brand_name_en }}" class="form-control">
                                                </div>
                                                @error('brand_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h5>Brand Name Hindi</h5>
                                                <div class="controls">
                                                    <input type="text" name="brand_name_hin"
                                                        value="{{ $brand->brand_name_hin }}" class="form-control">
                                                </div>

                                                @error('brand_name_hin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h5>Brand Image</h5>
                                                <div class="controls">
                                                    <input type="file" name="brand_image" class="form-control">
                                                    <div class="help-block"></div>
                                                </div>

                                                @error('brand_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="{{ $brand->id }}">
                                                <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                                                <input type="submit" name="Add" value="Update" class="btn btn-info">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
