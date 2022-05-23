@extends('admin.admin-master')
@section('content')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">SubCategory List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>SubCategory En</th>
                                            <th>SubCategory Hin</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategories as $subcategory)
                                            <tr>
                                                <td>{{ $subcategory->category->category_name_en }}</td>
                                                <td>{{ $subcategory->subcategory_name_en }}</td>
                                                <td>{{ $subcategory->subcategory_name_hin }}</td>
                                                <td width = "30%"><a href="{{ route('subcategory.edit', $subcategory->id) }}"
                                                        class="btn btn-info" title="Edit Data"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('subcategory.delete', $subcategory->id) }}"
                                                        id="delete" class="btn btn-danger" title="Delete Data"><i
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
                            <h3 class="box-title">Add SubCategory</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('subcategory.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>SubCategory English</h5>
                                                <div class="controls">
                                                    <input type="text" name="subcategory_name_en"
                                                        value="{{ old('subcategory_name_en') }}" class="form-control">
                                                </div>
                                                @error('subcategory_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h5>SubCategory Hindi</h5>
                                                <div class="controls">
                                                    <input type="text" name="subcategory_name_hin"
                                                        value="{{ old('subcategory_name_hin') }}" class="form-control">
                                                </div>
                                                @error('subcategory_name_hin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h5>Category Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control">
                                                        <option selected disabled>Select Category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->category_name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="help-block"></div>
                                                </div>

                                                @error('category_id')
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
