@extends('layouts.app')

@section('style')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet"> -->
@stop


@section('content')

<div class="col-lg-8">
    <div class="card">

        @include('admin.includes.errors')
        <div class="card-header">
            create a new post
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{route('admin.category.store')}}" method="post" >
                {{csrf_field()}}
                <div class="form-group">
                        <label for="title">Category Name</label>
                        <input type="text" name="category_name" class="form-control">
                </div>
                <div class="form-group">
                        <label for="feature">Category image</label>
                        <input type="file" name="picture" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Add Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
@section('script')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>  -->
  <!-- <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>  -->
<script>
    $(document).ready(function() {      
     $('#content').summernote();
});
</script>
@stop