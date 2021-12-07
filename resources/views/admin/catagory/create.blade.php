@extends('admin.layouts.app')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Blog Catagory</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Catagory</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="card card-teal">
    <div class="card-header">
        <h3 class="card-title">Blog Catagory Add Form</h3>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    <form  method="POST" action="{{route('catagories.store')}}" class="form-horizontal" enctype="multipart/form-data" >
        @csrf
        <div class="card-body">
            <div class="row col-md-12">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger position-relative">*</span></label>
                        <input class="form-control" type="text" name="name" placeholder="Name" id="name" required>
                        @error('name') 
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="slug">Slug <span class="text-danger position-relative">*</span></label>
                        <input class="form-control" type="text" name="slug" placeholder="slug" id="slug" required>
                        @error('slug') 
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="description">Description </label>
                        <textarea class="form-control" type="text" name="description" placeholder="description" id="description" required rows="5"></textarea>
                        @error('description') 
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="language_id">Language <span class="text-danger position-relative">*</span></label>
                        <select class="custom-select form-control-border" id="language_id" name="language_id">
                          <option value=""  disabled>Select Blog Language</option>
                          @foreach ($languages as $language)
                             <option value="{{$language->id}}">{{$language->name}}</option> 
                          @endforeach
                        </select>
                        @error('language_id') 
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="{{route('catagories.index')}}" class="btn btn-default">Cancel</a>
            <button type="submit" id="" class="btn btn-primary float-right">Submit</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
@endsection

@push('script')
<script>
    function slugify(string) {
        return string
        .toString()
        .trim()
        .toLowerCase()
        .replace(/\s+/g, "-")
        .replace(/[^\w\-]+/g, "")
        .replace(/\-\-+/g, "-")
        .replace(/^-+/, "")
        .replace(/-+$/, "");
    }  

    $(document).ready(function(){

        $("#name").keyup(function(){
            $value = $(this).val();
            if($value!==""){
                $value = $value.toLowerCase()
                        .replace(/ /g, '-')
                        .replace(/[^\w-]+/g, '') + "-" + Math.floor(Math.random() * 101);    
            }
            
            $("#slug").val($value); 
        });
    });
</script>

@endpush