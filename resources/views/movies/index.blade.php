@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach( $movies as $movie)
            <div class="col-4">
            <div class="card" style="width: 18rem;">
                <img src="{{$movie->img_src}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$movie->movie}}</h5>
                    <p class="card-text">{{$movie->description}}</p>
                    <a href="{{route('movies.show',$movie->id)}}" class="btn btn-primary">Show</a>
                    <a href="{{route('movies.edit',$movie->id)}}" class="btn btn-success">Edit</a>
                    <form method="POST" action="{{route('movies.destroy',$movie->id)}}">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn btn-danger" type="submit" value="Delete">
                    </form>

                </div>
            </div>
            </div>
        @endforeach
    </div>
@endsection
