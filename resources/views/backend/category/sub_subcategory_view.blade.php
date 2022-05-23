@extends('admin.admin-master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sub->SubCategory List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>SubCategory Name</th>
                                            <th>Sub-SubCategory Eng</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subsubcategories as $subsubcategory)
                                            <tr>
                                                <td>{{ $subsubcategory->category->category_name_en }}</td>
                                                <td>{{ $subsubcategory->subcategory->subcategory_name_en }}</td>
                                                <td>{{ $subsubcategory->subsubcategory_name_en}}</td>
                                                <td width="30%" ><a
                                                        href="{{ route('subsubcategory.edit', $subsubcategory->id) }}"
                                                        class="btn btn-info" title="Edit Data"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('subsubcategory.delete', $subsubcategory->id) }}"
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
                            <h3 class="box-title">Add SubSubCategory</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('subsubcategory.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>SubSubCategory English</h5>
                                                <div class="controls">
                                                    <input type="text" name="subsubcategory_name_en"
                                                        value="{{ old('subsubcategory_name_en') }}"
                                                        class="form-control">
                                                </div>
                                                @error('subsubcategory_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h5>SubSubCategory Hindi</h5>
                                                <div class="controls">
                                                    <input type="text" name="subsubcategory_name_hin"
                                                        value="{{ old('subsubcategory_name_hin') }}"
                                                        class="form-control">
                                                </div>
                                                @error('subsubcategory_name_hin')
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
                                                <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subcategory_id" class="form-control">
                                                        <option selected disabled>Select SubCategory</option>
                                                        
                                                    </select>
                                                    <div class="help-block"></div>
                                                </div>

                                                @error('subcategory_id')
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                        type: "GET", 
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection
