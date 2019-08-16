@extends('layouts.app')

@section('content')

<div class="col-lg-8">
    <div class="card">

        @include('admin.includes.errors')
        <div class="card-header">
            Update the Category:{{$place->place_name}}
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{route('admin.place.update',['id'=>$place->id])}}" method="post" >
                {{csrf_field()}}
                <div class="form-group">
                        <label for="title">Place Name</label>
                        <input type="text" name="place_name" class="form-control" value="{{$place->place_name}}">
                </div>
                <div class="form-group">
                        <label for="image">place image</label>
                        <input type="file" name="picture" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update Place</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
