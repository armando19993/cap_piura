<?php

namespace App\Http\Controllers;

use App\Models\ImagenNoticia;
use Illuminate\Http\Request;

class ImagenNoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImagenNoticia  $imagenNoticia
     * @return \Illuminate\Http\Response
     */
    public function show(ImagenNoticia $imagenNoticia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImagenNoticia  $imagenNoticia
     * @return \Illuminate\Http\Response
     */
    public function edit(ImagenNoticia $imagenNoticia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImagenNoticia  $imagenNoticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImagenNoticia $imagenNoticia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImagenNoticia  $imagenNoticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImagenNoticia $imagenNoticia)
    {
        
        $imagenNoticia->delete();
        return back();
    }
}
