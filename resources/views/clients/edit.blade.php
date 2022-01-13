@extends('layout.layout')

@section('content')
    <div class="mt-10 sticky w-full flex justify-center items-center">
        <div class="table mt-10">
            <h3 class="text-xl text-blue-900 font-semibold my-10 mx-10">Modification du client N° CLI0{{ $client->id }}</h3>
            <div class="mx-10">
                <form action="{{route('client.update', $client->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <x-inputValueComponent
                        name="nomClient"
                        type="text"
                        placeholder=""
                        :value="$client->nomClient"
                    >
                        <i class="fas fa-user"></i>
                    </x-inputComponent>

                    <x-inputValueComponent
                        name="soldeClient"
                        type="number"
                        placeholder=""
                        :value="$client->soldeClient"
                    >
                        <i class="fas fa-dollar-sign"></i>
                    </x-inputValueComponent>

                    <button class="bg-indigo-900 text-slate-50 px-4 py-2 w-full rounded outline-none my-5">
                        <i class="fas fa-check-square"></i>
                        <span id="save_cli" class="ml-2">Sauvegarder</span>
                    </button>
                </form>

            </div>
        </div>
    </div>
@endsection
