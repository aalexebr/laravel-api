@extends('layouts.app')
@section('main-content')
    <form action="{{route('admin.project.update',['project'=>$obj->id])}}" method="POST">
        @method('PUT')
        @csrf
        <h3>
            update
        </h3>
        <label for="title">insert title</label>
        <input type="text" 
            name="title" 
            value="{{old('title',$obj->title)}}">
        @error('title')
            <div class="alert alert-danger" role="alert">
            {{$message}}
            </div>
        @enderror
        {{-- <label for="title">insert content</label>
        <textarea name="content" >{{old('content',$obj->content)}}</textarea> --}}
        <div class="form-floating my-2">
            <textarea name="content"
                class="form-control" placeholder="Leave a comment here" id="floatingTextarea">
                {{old('content',$obj->content)}}
            </textarea>
            <label for="floatingTextarea">content here</label>
          </div>
          @error('content')
        <div class="alert alert-danger" role="alert">
            {{$message}}
          </div>
        @enderror
        {{--  --}}
        <select class="form-select" aria-label="Default select example" name="typeOf">
            <option selected value=''>Choose select</option>
              @foreach($types as $type)
                <option value="{{$type->id}}"
                    @if (old('typeOf',$obj->type_id) == $type->id)
                        selected
                    @endif>
                {{$type->name}}
                </option>
              @endforeach
        </select>
        {{-- date --}}
        <label for="date_start">insert start date</label>
        <input type="date" name="date_start" id="" value="{{old('date_start',$obj->start_date)}}">
        <label for="date_end">insert end date</label>
        <input type="date" name="date_end" id="" value="{{old('date_end',$obj->end_date)}}">
        @error('date_end')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
          @enderror
        {{-- techs --}}
        <div>
            @foreach ($techs as $tech)
                <label for="tech-{{$tech->id}}">{{$tech->name}}</label>
                <input type="checkbox" name="techs[]" id="tech-{{$tech->id}}" value="{{$tech->id}}"
                    @foreach ($objTechs as $objTech)
                        @if ($objTech->id == $tech->id)
                            checked
                        @endif
                    @endforeach
                    {{-- if(in_array($objTechs,$tech->id)) //otheer way round--}}
                >
            @endforeach
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection