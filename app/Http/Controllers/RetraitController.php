<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Retrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetraitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('retrait.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();

        return view('retrait.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'numCheque' => 'required',
            'client_id' => 'required',
            'montantRet' => 'required|numeric'
        ]);

        Retrait::create([
            'numCheque' => $request->numCheque,
            'client_id' => $request->client_id,
            'montantRet' => $request->montantRet,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('retrait.liste');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Retrait  $retrait
     * @return \Illuminate\Http\Response
     */
    public function show(Retrait $retrait)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Retrait  $retrait
     * @return \Illuminate\Http\Response
     */
    public function edit(Retrait $retrait)
    {
        return view('retrait.edit', compact('retrait'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Retrait  $retrait
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retrait $retrait)
    {
        $request->validate([
            'numCheque' => 'required',
            'montantRet' => 'required|numeric'
        ]);

        Retrait::where('id', $retrait->id)->update([
            'numCheque' => $request->numCheque,
            'montantRet' => $request-> montantRet,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('retrait.liste');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Retrait  $retrait
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retrait $retrait)
    {
        // dd($retrait->id);
        Retrait::destroy($retrait->id);
        return redirect()->route('retrait.liste');
    }

    public function details(Client $client){
        return view('retrait.details', compact('client'));
    }

    public function liste(){
        $retraits = Retrait::all();

        return view('retrait.liste', compact('retraits'));
    }
}
