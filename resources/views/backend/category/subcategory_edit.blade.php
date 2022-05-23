@extends('admin.admin-master')
@section('content')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit SubCategory</h3>
                        </div>
                    </div>

                </div>
                {{-- Edit SubCategory Section --}}
                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit SubCategory</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('subcategory.update') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>SubCategory English</h5>
                                                <div class="controls">
                                                    <input type="text" name="subcategory_name_en"
                                                        value="{{ $subcategory->subcategory_name_en }}"
                                                        class="form-control">
                                                </div>
                                                @error('subcategory_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h5>SubCategory Hindi</h5>
                                                <div class="controls">
                                                    <input type="text" name="subcategory_name_hin"
                                                        value="{{ $subcategory->subcategory_name_hin }}"
                                                        class="form-control">
                                                </div>
                                                @error('subcategory_name_hin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h5>Category Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control">
                                                        <option disabled>Select Category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }}> {{ $category->category_name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="help-block"></div>
                                                </div>

                                                @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="{{ $subcategory->id }}">
                                                <input type="submit" name="Add" value="Edit Category" class="btn btn-info">
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
