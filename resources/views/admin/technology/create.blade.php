@extends('layouts.app')
@section('main-content')
    <form action="{{route('admin.tech.store')}}" method="POST">
        @csrf
        Add name
        <input type="text" name="name" id="">
        <button type="submit" class="btn btn-success">
            Submit
        </button>
    </form>
@endsection