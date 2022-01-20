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
        $clients = Client::where('deleted', 0)->get();

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

        $client = Client::where('id', $request->client_id)->first();

        if($client->soldeClient < doubleval($request->montantRet)){
            return view('retrait.soldeinsuffisant', [
                "actuel" => $client->soldeClient,
                "demande" => $request->montantRet,
                "client" => $client
            ]);
        }else{
            Retrait::create([
                'numCheque' => $request->numCheque,
                'client_id' => $request->client_id,
                'montantRet' => $request->montantRet,
                'user_id' => Auth::user()->id,
            ]);
            return redirect()->route('retrait.liste');
        }
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
        // Retrait::destroy($retrait->id);
        Retrait::where('id', $retrait->id)->update([
            'deleted' => 1,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('retrait.liste');
    }

    public function details(Client $client){
        return view('retrait.details', compact('client'));
    }

    public function liste(){
        $retraits = Retrait::where('deleted', 0)->get();

        return view('retrait.liste', compact('retraits'));
    }
}
