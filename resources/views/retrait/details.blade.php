@extends('layout.layout')

@section('content')
<div class="mt-10 sticky w-full flex justify-center items-center">
    <div class="table my-10 pb-10">
        <div class="flex justify-center">
            <h3 class="text-3xl text-blue-900 font-bold my-10 mx-10">Retraits</h3>
        </div>
        <div class="mx-10">
            <div class="border-b border-gray-200 shadow">
                <table class="table-auto">
                    <thead class="bg-blue-900 text-slate-50">
                        <tr class="">
                            <th class="px-6 py-2 text-lg ">N° Client</th>
                            <th class="px-6 py-2 text-lg">Nom du Client</th>
                            <th class="px-6 py-2 text-lg">Montant acuel (Ar)</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr class="whitespace-nowrap text-gray-800">
                            <td class="px-6 py-6 text-sm "> COMP0{{ $client->id }} </td>
                            <td class="px-6 py-6 text-sm"> {{ $client->nomClient }} </td>
                            <td class="px-6 py-6 text-sm"> {{ $client->soldeClient }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <form action=" {{ route('retrait.store') }} " method="POST">
                @csrf
                <input type="number" name="client_id" value="{{ $client->id }}" class="hidden" >

                <x-inputComponent
                    name="numCheque"
                    type="number"
                    placeholder="N° Cheque"
                >
                    <i class="fas fa-money-check-alt"></i><span class="ml-2">CH0</span>
                </x-inputComponent>

                <x-inputComponent
                    name="montantRet"
                    type="number"
                    placeholder="Montant à retirer (Ar)"
                >
                    <i class="fas fa-dollar-sign"></i>
                </x-inputComponent>

                <button class="bg-indigo-900 text-slate-50 px-4 py-2 w-full rounded outline-none my-5">
                    <i class="fas fa-check-square"></i>
                    <span id="save_cli" class="ml-2">Retirer</span>
                </button>
            </form>

        </div>
    </div>
@endsection
