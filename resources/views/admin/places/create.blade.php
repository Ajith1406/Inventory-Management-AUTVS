@extends('layouts.app')

@section('content')

<div class="col-lg-8">
    <div class="card">

        @include('admin.includes.errors')
        <div class="card-header">
            Enter a new place
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{route('admin.place.store')}}" method="post" >
                {{csrf_field()}}
                <div class="form-group">
                        <label for="title">Place Name</label>
                        <input type="text" name="place_name" class="form-control">
                </div>
                <div class="form-group">
                        <label for="feature">Place image</label>
                        <input type="file" name="picture" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Add place</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
