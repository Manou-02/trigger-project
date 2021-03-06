@extends('layout.layout')

@section('content')
    <div class="mt-10 sticky w-full flex justify-center items-center">
        <div class="table mt-10">
            <h3 class="text-xl text-blue-900 font-semibold my-10 mx-10">Modification d'un retrait</h3>
            <div class="mx-10">
                <div class="border-b border-gray-200 shadow">
                    <table class="table-auto w-full">
                        <thead class="bg-blue-900 text-slate-50">
                            <tr class="">
                                <th class="px-6 py-2 text-lg ">N° Client</th>
                                <th class="px-6 py-2 text-lg">Nom du Client</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr class="whitespace-nowrap text-gray-800">
                                <td class="px-6 py-6 text-sm "> COMP0{{ $retrait->client->id }} </td>
                                <td class="px-6 py-6 text-sm"> {{ $retrait->client->nomClient }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <form action=" {{route('retrait.update', $retrait->id)}} " method="POST">
                    @method('PATCH')
                    @csrf

                    <x-inputValueComponent
                        name="numCheque"
                        type="number"
                        placeholder=""
                        :value="$retrait->numCheque"
                    >
                        @error('numCheque')
                            <p class="text-red-600"> {{ $message }} </p>
                        @enderror
                        <div class="">
                            <label for="">N° de cheque</label>
                        </div>
                        <i class="fas fa-money-check-alt"></i> <span class="ml-2">CH0</span>
                    </x-inputValueComponent>

                    <x-inputValueComponent
                        name="montantRet"
                        type="number"
                        placeholder=""
                        :value="$retrait->montantRet"
                    >

                        @error('montantRet')
                            <p class="text-red-600"> {{ $message }} </p>
                        @enderror
                        <div class="">
                            <label for="">Montant (Ar)</label>
                        </div>
                        <i class="fas fa-money-check-alt"></i>
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
