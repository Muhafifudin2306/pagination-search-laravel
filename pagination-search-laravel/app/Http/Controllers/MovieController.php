<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        

        $movie = Movie::with('genre')->latest()->paginate(5);
        
        return view('movie.dashboard', compact('movie'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $movie = Movie::where('judul', 'like', "%" . $keyword . "%")->paginate(5);
        return view('movie.dashboard', compact('movie'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function add()
    {
        $genre = Genre::All();
        return view('movie.add', compact('genre'));
    }
    public function addmovie(Request $request)
    {
        $movie = new Movie;
        $movie->judul = $request->judul;
        $movie->tanggal = $request->tanggal;
        $movie->genre_id = $request->genre_id;
        $movie->rating = $request->rating;
        $movie->save();

        return redirect('/');
    }
    public function edit($id)
    {
        $genre = Genre::all();
        $movie = Movie::with('genre')->findOrFail($id);

        return view('movie.edit', compact('movie', 'genre'));
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        $movie->judul = $request->judul;
        $movie->tanggal = $request->tanggal;
        $movie->genre_id = $request->genre_id;
        $movie->rating = $request->rating;

        if($movie->save())
        {
            return redirect('/');
        }
        else
        {
            return redirect()->back()->with('message','Gagal Mengedit Data');
        }
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        
        return redirect('/');
    }
}
