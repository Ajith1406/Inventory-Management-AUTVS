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
        All Conditions
        <div class="topnav-right">
            <a href="{{route('admin.condition.create')}}">Add new condition</a>
        </div>
        </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>Conditions</th>
                    <th>Editing</th>                    
                    <th>Deleting</th>
                
                </thead>
                <tbody>
                    @foreach($conditions as $condition)
                        <tr>
                        <td>{{$condition->condition}}</td>
                        <td><a href="{{route('admin.condition.edit',['id'=>$condition->id])}}" class="btn btn-info">Edit</a></td>
                        <td><a href="{{route('admin.condition.delete',['id'=>$condition->id])}}" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>


    </div>
    </div>

@stop