@extends('layouts.app')
@section('content')
    <form method="POST" action="{{route('movies.store')}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Movie Name</label>
            <input type="text" class="form-control" id="name" name="movie" placeholder="">
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Image</label>
            <input type="text" class="form-control" id="img" name="img_src" placeholder="">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="edescription" name="description" rows="3"></textarea>
        </div>
        @foreach($categories as $category)
        <div class="form-check">
            <input name="categories[]" class="form-check-input" type="checkbox" value="{{$category->id}}" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
               {{$category->category}}
            </label>
        </div>
        @endforeach
        <input  class="btn btn-primary" type="submit" value="Create">
    </form>
@endsection
