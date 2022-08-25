<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movie = Movie::select('*')->paginate(5);
        

        return view('movie.dashboard', ['movie'=>$movie]);
    }

    public function add()
    {
        return view('movie.add');
    }
    public function addmovie(Request $request)
    {
        $movie = new Movie;
        $movie->judul = $request->judul;
        $movie->tanggal = $request->tanggal;
        $movie->genre = $request->genre;
        $movie->rating = $request->rating;
        $movie->save();

        return redirect('/');
    }
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);

        return view('movie.edit', compact('movie'));
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        $movie->judul = $request->judul;
        $movie->tanggal = $request->tanggal;
        $movie->genre = $request->genre;
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
