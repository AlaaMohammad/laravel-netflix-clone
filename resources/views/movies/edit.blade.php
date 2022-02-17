@extends('layouts.app')
@section('content')
    <form method="POST" action="{{route('movies.update',$movie->id)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Movie Name</label>
            <input type="text" class="form-control" id="name" name="movie" placeholder="" value="{{$movie->movie}}">
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Image</label>
            <input type="text" class="form-control" id="img" name="img_src" placeholder="" value="{{$movie->img_src}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="edescription" name="description"
                      rows="3">{{$movie->description}}</textarea>
        </div>
        @foreach($categories as $category)
            <div class="form-check">
                <input name="categories[]" class="form-check-input" type="checkbox" value="{{$category->id}}"
                       id="flexCheckDefault" {{ $movie_categories->contains($category->id) ? 'checked' : ''}}   >
                <label class="form-check-label" for="flexCheckDefault">
                    {{$category->category}}
                </label>
            </div>
        @endforeach
        <input class="btn btn-primary" type="submit" value="Create">
    </form>
@endsection
