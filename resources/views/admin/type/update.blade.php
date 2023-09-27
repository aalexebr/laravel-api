@extends('layouts.app')
@section('main-content')
<form action="{{route('admin.type.update',['type'=>$obj->id])}}" method="POST">
    @csrf
    @method('PUT')
    current name = {{$obj->name}}
    <div>
        new:
    </div>
    <input type="text" name="name">
    <button type="submit" class="btn btn-success my-2">Update</button>
</form>
    
@endsection