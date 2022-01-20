<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Retrait;
use App\Models\Versement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clients = Client::where('deleted', '!=', 1)->get();
        //dd($clients);
        return view('clients.index', compact('clients'));
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

        $request->validate([
            'nomClient' => 'required',
            'soldeClient' => 'required|numeric'
        ]);

        Client::create([
            'nomClient' => $request->nomClient,
            'soldeClient' => $request->soldeClient,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        dd($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //dd($client);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'nomClient' => 'required',
            'soldeClient' => 'required'
        ]);

        Client::where('id', $client->id)->update([
            'nomClient' => $request->nomClient,
            'soldeClient' => $request->soldeClient,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        // dd($client->id);
        // Client::destroy($client->id);
        Client::where('id', $client->id)->update([
            'deleted' => 1,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('client.index');


    }

    public function details($id){
        $client = Client::where('id', $id)->first();
        $retraits = Retrait::where('client_id', $id)->get();
        $versements = Versement::where('client_id', $id)->get();

        return view('clients.details',[
            'client' => $client,
            'retraits' => $retraits,
            'versements' => $versements
        ]);
    }
}
