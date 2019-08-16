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
  padding: 8px 10px;
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
        All Items
        <div class="topnav-right">
            <a href="{{route('admin.item.create')}}">Add new Item</a>
        </div>
        </div>
        <!-- <a href="{{route('admin.items.excel')}}" class="btn btn-info">Export Excel  </a> -->
        
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>image</th>
                    <th>Name</th>
                    <!-- <th>QR-Code</th> -->
                    <th>Editing</th>
                    <th>Deleting</th>
                
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                        <td><img src="{{$item->image}}" alt="{{$item->name}}" width="50px" height="50px"></td>
                        <td>{{$item->name}}</td>
                        <!-- {{$qrcode=$item->name}}
                        
                        <td>{!! QrCode::size(200)->margin(1)->generate($qrcode, 'downloads\qr-codes\code.svg'); !!}</td> -->
                        <td><a href="{{route('admin.item.edit',['id'=>$item->id])}}" class="btn btn-info">Edit</a></td>
                        <td><a href="{{route('admin.item.delete',['id'=>$item->id])}}" class="btn btn-danger">delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>


    </div>
    </div>

@stop