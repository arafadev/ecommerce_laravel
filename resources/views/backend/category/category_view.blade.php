@extends('admin.admin-master')
@section('content')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Category List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category icon</th>
                                            <th>Category En</th>
                                            <th>Category Hin</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td><span><i class="{{ $category->category_icon }}"></i></span></td>
                                                
                                                <td>{{ $category->category_name_en }}</td>
                                                <td>{{ $category->category_name_hin }}</td>
                                                <td><a href="{{ route('category.edit', $category->id) }}"
                                                        class="btn btn-info" title="Edit Data"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('category.delete', $category->id) }}" id="delete"
                                                        class="btn btn-danger" title="Delete Data"><i
                                                            class="fa fa-trash"></i></a>
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
                {{-- Add Category Section --}}
                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('category.store') }}" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Category English</h5>
                                                <div class="controls">
                                                    <input type="text" name="category_name_en" value="{{ old('category_name_en') }}" class="form-control">
                                                </div>
                                                @error('category_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h5>Category Hindi</h5>
                                                <div class="controls">
                                                    <input type="text" name="category_name_hin" value = "{{ old('category_name_hin') }}" class="form-control">
                                                </div>

                                                @error('category_name_hin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h5>Category Icon</h5>
                                                <div class="controls">
                                                    <input type="text" name="category_icon" value="{{ old('category_icon') }}" class="form-control">
                                                </div>
                                                @error('category_icon')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
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
