@extends('layouts.app')
@section('style')
<style>
.topnav {
  overflow: hidden;
}

.topnav a {
  float: left;
  color: #ff6347;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 15px;
}

.topnav a:hover {
  background-color: rgb(255, 215, 71);
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav-right {
  float: right;
}
</style>
@stop
@section('script')

@stop

@section('content')


    <div class="col-lg-8">
    <div class="card">
        <div class="card-header">
        <div class="topnav">
        All Categories
        <div class="topnav-right">
            <a href="{{route('admin.category.create')}}">Add new Category</a>
        </div>
        </div>
</div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>image</th>
                    <th>Category</th>
                    <th>Editing</th>
                    <th>Deleting</th>
                
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                        <td><img src="{{$category->picture}}" alt="{{$category->name}}" width="60px" height="50px"></td>
                        <td>{{$category->category_name}}</td>
                        <td><a href="{{route('admin.category.edit',['id'=>$category->id])}}" class="btn btn-info">Edit</a></td>
                        <td><a href="{{route('admin.category.delete',['id'=>$category->id])}}" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>


    </div>
    </div>

@stop