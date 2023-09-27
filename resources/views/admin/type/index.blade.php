@extends('layouts.app')
@section('main-content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($types as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>
              <a href="{{route('admin.type.edit',['type'=>$item->id])}}"
                class="btn btn-primary my-1">
                Update</a>
                <a href="{{route('admin.type.show',['type'=>$item->id])}}"
                    class="btn btn-success my-1">
                    show Portfolio</a>
              {{-- <a href="{{route('admin.type.show',['type'=>$item->id])}}">
                view</a> --}}
              <form action="{{route('admin.type.destroy',['type'=>$item->id])}}" method="POST" class="my-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                  Delete
                </button>
              </form>
            </td>
        </tr> 
        @endforeach
      
    </tbody>
  </table>
@endsection