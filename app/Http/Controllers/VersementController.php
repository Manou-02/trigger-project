<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Versement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $clients = Client::all();

        return view('versement.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Versement::create([
            "numCheque" => $request->numCheque,
            "client_id" => $request->client_id,
            "montantVerse" => $request->montant_verse,
            "user_id" => Auth::user()->id,
        ]);

        return redirect()->route('versement.liste');
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
        return view('versement.edit', compact('versement'));
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
        Versement::where('id', $versement->id)->update([
            'numCheque' => $request->numCheque,
            'montantVerse' => $request->montantVerse
        ]);
        return redirect()->route('versement.liste');
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
        Versement::destroy($versement->id);

        return redirect()->back();

    }



    /**Liste de tous les versements */
    public function listeVersement()
    {

        $versements = Versement::all();
        return view('versement.liste', compact('versements'));
    }


    /** Show the client in versement */
    public function details(Client $client){

        return view('versement.details', compact('client'));
    }

}
