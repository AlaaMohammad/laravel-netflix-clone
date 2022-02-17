<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $movies = Movie::all();
        return view('movies.index', compact('movies'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('movies.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'movie' =>'required'
        ]);
        $movie = Movie::create([
            'movie' =>$request->movie,
            'img_src' => $request->img_src,
            'description' =>$request->description
        ]);

        //dd($request->categories);
        $movie->categories()->attach($request->categories);

        dd($movie);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
        $categories = Category::all();
        $movie_categories = $movie->categories()->pluck('category_id');
        //dd($movie_categories);
        return view('movies.edit', compact('categories','movie','movie_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
        //dd($request);
        $request->validate([
            'movie' =>'required'
        ]);
        $movie->update([
            'movie' =>$request->movie,
            'img_src' => $request->img_src,
            'description' =>$request->description
        ]);


        $movie->categories()->sync($request->categories);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
        $movie->deleteOrFail();
        $movie_categories = $movie->categories()->pluck('category_id');
        //$movie->categories()->detach($movie_categories);
        $movie->categories()->sync($movie_categories);
    }
}
