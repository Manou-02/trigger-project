<?php

namespace App\Http\Controllers;

use App\Models\Versement;
use Illuminate\Http\Request;

class VersementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('versement.index');
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
     * @param  \App\Models\Versement  $versement
     * @return \Illuminate\Http\Response
     */
    public function show(Versement $versement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Versement  $versement
     * @return \Illuminate\Http\Response
     */
    public function edit(Versement $versement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Versement  $versement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Versement $versement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Versement  $versement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Versement $versement)
    {
        //
    }
}
