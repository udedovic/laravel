<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Songs;

class SongsController extends Controller
{
    public function index()
    {

        $songs = auth()->user()->songs();
        return view('dashboard', compact('songs'));
    }

    public function add()
    {

        return view('add');
    }

    public function create(Request $request)
    {

        $this->validate($request, ['song_name' => 'required', 'artist' => 'required']);
        $song = new Songs();
        $song->song_name = $request->song_name;
        $song->artist = $request->artist;
        $song->user_id = auth()->user()->id;
        $song->save();
        return redirect('/dashboard');
    }

    public function edit(Songs $song)
    {

        if (auth()->user()->id == $song->user_id) {

            return view('edit', compact('song'));
        } else {
            return   redirect('/dashboard');
        }
    }

    public function update(Request $request, Songs $song)
    {
        if (isset($_POST['delete'])){

            $song->delete();
            return redirect('/dashboard');
        };
        $this->validate($request, ['song_name' => 'required', 'artist' => 'required']);
        $song->song_name = $request->song_name;
        $song->artist = $request->artist;
        $song->save();
        return redirect('/dashboard');
    }


}
