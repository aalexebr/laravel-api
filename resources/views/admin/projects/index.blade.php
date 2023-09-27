@extends('layouts.app')
@section('main-content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">title</th>
        {{-- <th scope="col">slug</th> --}}
        <th scope="col">date</th>
        <th scope="col">type</th>
        <th scope="col">tech</th>
        {{-- <th scope="col">img</th> --}}
        <th scope="col">actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($projects as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->title}}</td>
            {{-- <td>{{$item->slug}}</td> --}}
            <td>
              @if ($item->start_date && $item->end_date)
                  {{$item->start_date}} to {{$item->end_date}}
              @endif
            </td>
            @if ($item->type)
                <td>{{$item->type->name}}</td> 
            @else
              <td>-</td> 
            @endif
            {{-- @dd($item->giveTech) --}}
            @if ($item->giveTech)
                <td>
                  @foreach ($item->giveTech as $tech)
                  {{-- since its a collection it must be cycled --}}
                      {{$tech->name}}
                  @endforeach
                </td>
            @else
              <td>-</td> 
            @endif
            {{-- @if ($item->img)
                <td>
                  <img src="/storage/{{$item->img}}" alt="">
                </td>
            @else
              <td>
                -
              </td>
            @endif --}}
            <td>
              <a href="{{route('admin.project.edit',['project'=>$item->id])}}"
                class="btn btn-primary my-1">
                Update</a>
              {{-- <a href="{{route('admin.portfolio.show',['portfolio'=>$item->id])}}">
                view</a> --}}
              <form action="{{route('admin.project.destroy',['project'=>$item->id])}}" method="POST" class="my-1">
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