<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genre = Genre::select('*')->paginate(5);

        return view('genre.dashboard', compact('genre'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $genre = Genre::where('nama', 'like', "%" . $keyword . "%")->paginate(5);
        return view('genre.dashboard', compact('genre'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function add()
    {
        return view('genre.add');
    }
    public function addgenre(Request $request)
    {
        $genre = new Genre;
        $genre->nama = $request->nama;
        $genre->save();

        return redirect('/genre');
    }

    public function edit($id)
    {
        $genre = Genre::findOrFail($id);

        return view('genre.edit', compact('genre'));
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        $genre->nama = $request->nama;

        if($genre->save())
        {
            return redirect('/genre');
        }
        else
        {
            return redirect()->back()->with('message','Gagal Mengedit Data');
        }
    }

    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();
        
        return redirect('/genre');
    }

}
