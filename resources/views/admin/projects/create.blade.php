@extends('layouts.app')
@section('page-tite','create')
@section('main-content')
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <form action="{{route('admin.project.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">insert title</label>
        <input type="text" name="title" value="{{old('title')}}">
        @error('title')
        <div class="alert alert-danger" role="alert">
            {{$message}}
          </div>
        @enderror
        <div class="form-floating my-2">
            <textarea name="content"
                class="form-control" placeholder="add content" id="floatingTextarea">
                {{old('content')}}
            </textarea>
            <label for="floatingTextarea">content here</label>
          </div>
          @error('content')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
          @enderror
          <select class="form-select" aria-label="Default select example" name="typeOf">
          <option selected value=''>Choose select</option>
            @foreach($types as $type)
            <option value="{{$type->id}}" {{old('typeOf')==$type->id?'selected':''}}>{{$type->name}}</option>
            @endforeach
        </select>
        <label for="date_start">insert start date</label>
        <input type="date" name="date_start" id="" value="{{old('date_start')}}">
        <label for="date_end">insert end date</label>
        <input type="date" name="date_end" id="" value="{{old('date_end')}}">
        @error('date_end')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
          @enderror
        <div>
          @foreach ($techs as $tech)
            <label for="tech-{{$tech->id}}">{{$tech->name}}</label>
            <input type="checkbox" name="techs[]" id="tech-{{$tech->id}}" value="{{$tech->id}}">  
          @endforeach
        </div>
        <div>
          <label for="img_path">ADD IMG</label>
          <input type="file" name="img_path" id="img_path" accept="image/*">
        </div>
        <button type="submit" class="btn btn-success my-3">
            Create
        </button>
    </form>
@endsection