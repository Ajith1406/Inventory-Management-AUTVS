@extends('layouts.app')

@section('style')
@stop


@section('content')

<div class="col-lg-8">
    <div class="card">

        @include('admin.includes.errors')
        <div class="card-header">
            Add New Item
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{route('admin.item.store')}}" method="post" >
                {{csrf_field()}}
                    <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                            <label for="feature">Item image</label>
                            <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" id="category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="place">Place</label>
                    @foreach($places as $place)
                        <div class="radio">
                        <label for="place"><input type="radio"name="place_id" value="{{$place->id}}">{{$place->place_name}}</label>
                        </div>
                    
                    @endforeach
                    </div>
                    <div class="form-group">
                    <label for="condition">Condition</label>
                    @foreach($conditions as $condition)
                        <div class="checkbox">
                        <label for="condition"><input type="checkbox"name="condition_id[]" value="{{$condition->id}}">{{$condition->condition}}</label>
                        </div>                    
                    @endforeach
                    </div>
                    <div class="form-group">
                        <label for="date">Bought Date</label><br>
                        <input type="date" class="form-control" name="bought_at">
                    </div>
                    <div class="form-group">
                        <label for="cost">Bought Cost</label>
                        <input type="number" class="form-control" name="cost">
                    </div>
                    <div class="form-group">
                            <label for="content">Description</label>
                            <textarea name="description" id="content" cols="5" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="text-center"> 
                            <button class="btn btn-success" type="submit">Add Item</button>
                        </div>
                    </div>

            </form>
        </div>
    </div>
</div>
@stop
@section('script')   

@stop