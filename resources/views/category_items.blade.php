@extends('layouts')

@section('content')
<div class="card">
    <div class="card-header">Category:{{$category->category_name}}</div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
            <th>Id</th>
            <th>Item Name</th>
            <th>Item Image</th>
            <th>Category</th>
            <th>Place</th>
            <th>conditon</th>
            <th>Bought_at</th>
            <th>Cost</th>
            <th>Description</th>
            </thead>

            <tbody>
                    @foreach($category->items as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td><img src="{{$item->image}}" alt="{{$item->name}}" width="50px"></td>
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

    

@stop