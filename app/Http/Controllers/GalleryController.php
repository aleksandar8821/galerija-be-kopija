<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::with(['user', 'images'/* => function ($query) {
            $query->first();
        }*/])->latest()->get();
        return $galleries;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $gallery = Gallery::with('images')->create([
        //     'name' => $request->input('name'),
        //     'description' => $request->input('description'),
        //     // 'user_id' => \Auth::user()->id
        //     'user_id' => $request->input('user_id')
        // ]);

        $gallery = Gallery::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'user_id' => \Auth::user()->id
            // 'user_id' => $request->input('user_id')
        ]);

        // $gallery->images()->createMany($request->input('images'));

        foreach ($request->input('images') as $key => $value) {
            $gallery->images()->create([
                'url' => $value,
                ]);
        }

        return $request;
        // $pera = 'djoka';
        // return json_encode(compact('pera'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = Gallery::with(['user', 'images'])->find($id);
        return $gallery;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getMyGalleries()
    {
        $galleries = Gallery::where('user_id', \Auth::user()->id)->get();
        return $galleries;
    }

    public function getAuthorsGalleries($id)
    {
        $galleries = Gallery::where('user_id', $id)->get();
        return $galleries;
    }
}
