@extends('layouts.app')
@section('main-content')
    <h3>
        name Type: {{$obj->name}}
    </h3>
    <ul>
        @if($obj->usePortfolio)
            @foreach ($obj->usePortfolio as $item)
                <li>
                    {{$item->title}} <a href="{{route('admin.project.edit',['project'=>$item->id])}}"
                        class="btn btn-primary my-1">
                        Update</a>
                </li>
            @endforeach
        @endif
    </ul>
@endsection