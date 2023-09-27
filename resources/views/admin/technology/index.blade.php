@extends('layouts.app')
@section('main-content')

<table class="table">
  <a href="{{route('admin.tech.create')}}" class="btn btn-primary">add new technology</a>
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($techs as $tech)
        <tr>
            <th scope="row">{{$tech->id}}</th>
            <td>{{$tech->name}}</td>
            {{-- <td>
              <a href="{{route('admin.tech.edit',['tech'=>$item->id])}}"
                class="btn btn-primary my-1">
                Update</a>
                <a href="{{route('admin.tech.show',['tech'=>$item->id])}}"
                    class="btn btn-success my-1">
                    view projects</a>
              {{-- <a href="{{route('admin.tech.show',['tech'=>$item->id])}}">
                view</a> --}}
              {{-- <form action="{{route('admin.tech.destroy',['tech'=>$item->id])}}" method="POST" class="my-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                  Delete
                </button>
              </form>
            </td> --}} 
        </tr> 
        @endforeach
      
    </tbody>
  </table>
@endsection