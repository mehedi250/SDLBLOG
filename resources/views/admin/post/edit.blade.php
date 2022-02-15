@extends('admin.layouts.app')
@push('css')
    <style>
        #result {
            border: 1px dotted rgb(240, 240, 240);
            padding: 0px 0px;
        }
        #result ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        #result ul li {
            padding: 5px 5px;
            cursor: pointer;
        }
        #result ul li:hover {
            background: #eee;
        }
        .pointer{
            cursor: pointer;
        }
        .tag-border{
            border: 1px solid rgb(141, 141, 141);
            border-radius: 5px;
            margin-right: 12px;
            font-weight: 500;
            background: linear-gradient(to top, rgb(172, 191, 255), white,rgb(172, 191, 255));
        }
    </style>
@endpush
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Post</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Post</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    @include('admin.layouts.partials.message')
@endsection


@section('content')
<div class="card card-teal">
    <div class="card-header">
        <h3 class="card-title">Blog Post Update Form</h3>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    <form  method="POST" action="{{route('posts.update', $post->id)}}" class="form-horizontal" enctype="multipart/form-data" >
        @method('PUT')
        @csrf
        <div class="card-body">
            <div class="row col-md-12">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="title">Title <span class="text-danger position-relative">*</span></label>
                        <input class="form-control" value="{{ $post->title }}" type="text" name="title" placeholder="Title" id="title" required>
                        @error('title') 
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="slug">Slug <span class="text-danger position-relative">*</span></label>
                        <input class="form-control" value="{{ $post->slug }}" type="text" name="slug" placeholder="slug" id="slug" required>
                        @error('slug') 
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="language_id">Language <span class="text-danger position-relative">*</span></label>
                        <select class="custom-select form-control-border" id="language_id" name="language_id">
                            @foreach ($languages as $language)
                                <option @if ($post->language_id === $language->id) selected @endif value="{{$language->id}}">{{$language->name}}</option> 
                            @endforeach
                        </select>
                        @error('language_id') 
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="catagory_id">Catagory <span class="text-danger position-relative">*</span></label>
                        <select class="custom-select form-control-border" id="catagory_id" name="catagory_id">
                          @foreach ($catagories as $catagory)
                             <option @if ($post->catagory_id === $catagory->id) selected @endif value="{{$catagory->id}}">{{$catagory->name}}</option> 
                          @endforeach
                        </select>
                        @error('catagory_id') 
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputFile">Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="file-input w-100" id="exampleInputFile" name="image">
                            <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                          </div>
                        </div>
                        @error('image') 
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="slug">Post Body <span class="text-danger position-relative">*</span></label>
                       <textarea id="summernote" name="post_body"  placeholder="Enter Post Body Content" required>{{ $post->post_body }}</textarea>
                        @error('post_body') 
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="description">Short Description <span class="text-danger position-relative">(Optional)</span></label>
                        <textarea class="form-control" type="text" name="short_description" placeholder="Short Description" id="description" rows="5">{{ $post->short_description }}</textarea>
                        @error('short_description') 
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                
                <div class="col-12">
                    <h5>Add New Tags</h5>
                    <div class="previous-tag">

                    </div>
                    <div id="all-tag"></div>
                    <hr>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="input-group">
                        <input type="text" id="key" class="form-control"  autocomplete="off" onkeyup="showResults(this.value)">
                        <div class="input-group-append">
                            <span class="input-group-text pointer" onclick="finalTag();"><i class="fas fa-plus"></i></span>
                        </div>
                    </div>
                    <div id="result"> </div> 
                </div>
                <div class="col-12 mt-4">
                    <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="checkboxPrimary1" name="is_published" @if ($post->is_published === 1) checked @endif>
                          <label for="checkboxPrimary1">
                              Is Published?
                          </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="{{route('posts.index')}}" class="btn btn-default">Cancel</a>
            <button type="submit" id="" class="btn btn-primary float-right">Submit</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>

<div class="row">
    <div class="col-12">
        <h5>Delete Tags</h5>
    </div>
    
    <div class="previous-tag col-12">
        @foreach ($post->tags as $item)
        <form style="display:inline;" method="POST" action="{{route('post-tags.destroy',$item->id)}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <span class="tag-border">{{ $item->keyword }}
                <span class="pointer removeParent deletePresident" >&#10060;</span>
            </span> 
        </form>
               
        @endforeach
        
    </div>
    <hr>
</div>


@endsection

@push('script')

    <script>
        $(document).ready(function(){
            var tags = {!! json_encode($tags->toArray()) !!};
            $("#title").keyup(function(){
                $value = $(this).val();
                if($value!==""){
                    $value = $value.replace(/ /g, '-') + "-" + Math.floor(Math.random() * 101);    
                }
                $("#slug").val($value); 
            });
        });
    </script>
    <script>
        $(function () {
            $('#summernote').summernote({
                height: 300     
            });
        });
        $(function () {
            bsCustomFileInput.init();
        });   
    </script>

    <script>
        var search_terms = {!! json_encode($tags->toArray()) !!};
        function autocompleteMatch(input) {
            if (input == '') {
                return [];
            }
            input = input.toLowerCase();
            var reg = new RegExp(input);
            return search_terms.filter(function(term) {
                var term2 = term.toLowerCase();
                if (term2.match(reg)) {
                    return term;
                }
            });
        }
        
        function showResults(val) {
            res = document.getElementById("result");
            res.innerHTML = '';
            let list = '';
            let terms = autocompleteMatch(val);
            for (i=0; i<terms.length; i++) {
                list += '<li value="vall" onclick="getTag(this.innerHTML)">' + terms[i] + '</li>';
            }
            res.innerHTML = '<ul>' + list + '</ul>';
        }

        function getTag(val){
            var tagInput = document.getElementById("key");
            tagInput.value = ''+ val +'';
        }
        function finalTag(){
            var tagName = document.getElementById("key");
            var tagInput = document.getElementById("all-tag");
            var tag = tagName.value;
            tagName.value = '';

            if(tag!==""){
                var html = '<span class="tag-border"><input type="hidden" name="keyword[]" value="'+tag+'">'
                +tag+'<span value="a" class="pointer removeParent" onclick="removeParent(this.parentNode)">&#10060;</span></span>';

                tagInput.insertAdjacentHTML("beforeend",html);
                showResults("");    
            }
        }
        function removeParent(par){ 
            par.remove();
        }

    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.deletePresident').click(function(){
                if(confirm("Do you want to delete this tag?")){
                   $(this).closest('form').submit(); 
                }
            });
        });
    </script>
@endpush
