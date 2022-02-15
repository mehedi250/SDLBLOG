@extends('admin.layouts.app')
@push('css')

@endpush
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">General Setting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">General Setting</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    @include('admin.layouts.partials.message')
@endsection


@section('content')
<div class="card card-teal">
    <div class="card-header">
        <h3 class="card-title">General Setting</h3>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    <form  method="POST" action="{{route('general-setting.update', $setting->id)}}" class="form-horizontal" enctype="multipart/form-data" >
        @method('PUT')
        @csrf
        <div class="card-body">
            <div class="row col-md-12">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="site_name">Site Name <span class="text-danger position-relative">*</span></label>
                        <input class="form-control" value="{{ $setting->site_name }}" type="text" name="site_name" placeholder="Site Name" id="site_name" required>
                        @error('site_name') 
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="col-md-4 col-8">
                    <div class="form-group">
                        <label for="exampleInputFile">Logo</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="file-input w-100" id="exampleInputFile" name="logo">
                            <label class="custom-file-label" for="exampleInputFile">Choose Logo</label>
                          </div>
                        </div>
                        @error('logo') 
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @if ($setting->logo!=null)
                <div class="col-md-2 col-4">
                    <div class="form-group">
                        <img src="{{asset($setting->logo)}}" alt="" class="w-100" style="max-width: 80px;">
                    </div>
                </div>
                @endif
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="facebook_link">Facebook Link</label>
                        <input class="form-control" value="{{ $setting->facebook_link }}" type="text" name="facebook_link" placeholder="Facebook Link" id="facebook_link">
                        @error('facebook_link') 
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="twitter_link">Twitter Link</label>
                        <input class="form-control" value="{{ $setting->twitter_link }}" type="text" name="twitter_link" placeholder="Twitter Link" id="twitter_link">
                        @error('twitter_link') 
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" id="" class="btn btn-primary float-right">Submit</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>




@endsection

@push('script')

    <script>
        $(function () {
            bsCustomFileInput.init();
        });   
    </script>


@endpush
