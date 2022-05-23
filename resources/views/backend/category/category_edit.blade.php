@extends('admin.admin-master')
@section('content')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                {{-- Add Category Section --}}
                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('category.update') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Category English</h5>
                                                <div class="controls">
                                                    <input type="text" name="category_name_en"
                                                        value="{{ $category->category_name_en }}" class="form-control">
                                                </div>
                                                @error('category_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h5>Category Hindi</h5>
                                                <div class="controls">
                                                    <input type="text" name="category_name_hin"
                                                        value="{{ $category->category_name_hin }}" class="form-control">
                                                </div>

                                                @error('category_name_hin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h5>Category Icon</h5>
                                                <div class="controls">
                                                    <input type="text" name="category_icon"
                                                        value="{{ $category->category_icon }}" class="form-control">
                                                </div>
                                                @error('category_icon')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="{{ $category->id }}">
                                                <input type="submit" name="Add" value="Add Category" class="btn btn-info">
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
