@extends('layouts.app')

@section('content')

<div class="col-lg-8">
    <div class="card">

        @include('admin.includes.errors')
        <div class="card-header">
            Enter a new Condition
        </div>
        <div class="card-body">
            <form action="{{route('admin.condition.store')}}" method="post" >
                {{csrf_field()}}
                <div class="form-group">
                        <label for="title">Enter New Condtion</label>
                        <input type="text" name="condition" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Add condition</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
