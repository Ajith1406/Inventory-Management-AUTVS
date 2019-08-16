@extends('layouts')      
@section('style')
<style>
    .col-lg-8{
        margin-left:200px;
        margin-top:10px;
    }
</style>
@stop
@section('content')
 <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        SEARCH
                    </div>

                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{route('admin.item.store')}}" method="post" >
                        {{csrf_field()}}
                            <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="place">Place</label>
                            <select name="place" id="" class="form-control">
                                @foreach($places as $place) 
                                    <option value="{{$place->id}}">{{$place->place_name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="condition">Condition</label>
                            <select name="condtion" id="condition" class="form-control">
                                @foreach($conditions as $condition)
                                    <option value="{{$condition->id}}">{{$condition->condition}} </option>
                                @endforeach
                            </select>
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
                                <div class="text-center"> 
                                    <button class="btn btn-success" type="submit">SEARCH</button>
                                </div>
                            </div>

                    </form>
                    </div>
                </div>
 </div>
 @stop