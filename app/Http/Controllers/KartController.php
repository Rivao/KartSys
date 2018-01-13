<?php

namespace App\Http\Controllers;

use App\Kart;
use Illuminate\Http\Request;

class KartController extends Controller
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
        return view('karts.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //method where data is going to be validated and stored
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kart  $kart
     * @return \Illuminate\Http\Response
     */
    public function show(Kart $kart)
    {
        return view('karts.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kart  $kart
     * @return \Illuminate\Http\Response
     */
    public function edit(Kart $kart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kart  $kart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kart $kart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kart  $kart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kart $kart)
    {
        //
    }
}
