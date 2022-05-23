@extends('admin.admin-master')
@section('content')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Brand List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Brand En</th>
                                            <th>Brand Hin</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $brand)
                                            <tr>
                                                <td>{{ $brand->brand_name_en }}</td>
                                                <td>{{ $brand->brand_name_hin }}</td>
                                                <td><img src="{{ asset($brand->brand_image) }}" style="width:70px"
                                                        height="70px"></td>
                                                <td>
                                                    <a href="{{ route('brand.edit',$brand->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('brand.delete',$brand->id) }}" id="delete" class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Brand</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Brand Name English</h5>
                                                <div class="controls">
                                                    <input type="text" name="brand_name_en" value="{{ old('brand_name_en') }}" class="form-control">
                                                </div>
                                                @error('brand_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h5>Brand Name Hindi</h5>
                                                <div class="controls">
                                                    <input type="text" name="brand_name_hin" value="{{ old('brand_name_hin') }}" class="form-control">
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
                                                <input type="submit" name="Add" value="Add Brand" class="btn btn-info">
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
