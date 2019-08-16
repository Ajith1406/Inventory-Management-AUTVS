@extends('layouts')

@section('content')
<div class="col-lg-12">
<div class="card">
    <div class="card-header">
        <ul>
        <li>All Items</li>
        <li style="float:right;"><a href="{{ route('allitems.download') }}" class="btn btn-success">Download Docs</a></li>
        </ul>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
            <th>Id</th>
            <th>Item Name</th>
            <th>Item Image</th>
            <th>QR Code</th>
            <th>Category</th>
            <th>Place</th>
            <th>conditon</th>
            <th>Bought_at</th>
            <th>Cost</th>
            <th>Description</th>
            </thead>

            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td><img src="{{$item->image}}" alt="{{$item->name}}" width="50px"></td>
                    <td><img src="data:image/png;base64,{{DNS2D::getBarcodePNG('id ='.$item->id.';'.'item name ='.$item->name.';'.'category = '.$item->category->category_name.';'.'place ='.$item->place->place_name.';', 'QRCODE')}}" alt="barcode" width="50px" height="50px" /></td>
                    <td>{{$item->category->category_name}}</td>
                    <td>{{$item->place->place_name}}</td>
                    <td>
                        @foreach($item->conditions as $t)
                        {{$t->condition}}
                        @endforeach
                    </td>
                    <td>{{$item->bought_at}}</td>
                    <td>{{$item->cost}}</td>
                    <td>{{$item->description}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    
    </div>

</div>
</div>
@stop