@extends('layouts.app')

@section('content')

<div class="col-lg-8">
    <div class="card">

        @include('admin.includes.errors')
        <div class="card-header">
            Update the Category:{{$category->category_name}}
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{route('admin.category.update',['id'=>$category->id])}}" method="post" >
                {{csrf_field()}}
                <div class="form-group">
                        <label for="title">Category Name</label>
                        <input type="text" name="category_name" class="form-control" value="{{$category->category_name}}">
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
