<?php

namespace App\Http\Controllers;

use App\Album;
use App\Http\Requests\AlbumRequest;
use Illuminate\Support\Facades\Auth;

class AlbumsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('can:view,album')->only(['show',]);
//        $this->middleware('can:update,album')->only(['edit', 'update',]);
//        $this->middleware('can:delete,album')->only(['destroy',]);
        $this->authorizeResource(Album::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Auth::user()->albums;

        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create')->with(['buttonName' => 'Create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AlbumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumRequest $request)
    {
        $album = new Album($request->all());
        Auth::user()->albums()->save($album);

        return redirect('/')->with([
            'flash_info' => 'Your album has been created.',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Album $album
     * @return Album
     */
    public function show(Album $album)
    {

        return $album;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'))->with(['buttonName' => 'Save']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AlbumRequest  $request
     * @param  \App\Album $album
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumRequest $request, Album $album)
    {
        $album->update($request->all());

        return redirect('albums')->with([
            'flash_info' => 'Album has been updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return response()->json($album);
        return redirect('albums')->with([
            'flash_info' => 'Album has been deleted.',
        ]);
    }
}
