@extends('layout.layout')

@section('content')
    <div class="m-20">
        <div class="flex justify-center mb-5">
            <h3 class="text-blue-900 text-2xl font-bold">Détails du compte N° COMP{{ $client->id }}</h3>
        </div>
        <div class="card flex justify-center">
            <div class="my-4 py-5 px-10">
                <div class="flex justify-center mb-4">
                    <p class="text-xl text-blue-900 font-semibold">Information du client</p>
                </div>
                <table class="table-auto">
                    <thead class="bg-slate-600 text-slate-50">
                        <tr class="">
                            <th class="px-6 py-2 text-lg ">N° Client</th>
                            <th class="px-6 py-2 text-lg">Nom du Client</th>
                            <th class="px-6 py-2 text-lg">Solde acuel (Ar)</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr class="whitespace-nowrap text-gray-800">
                            <td class="px-6 py-6"> COMP0{{ $client->id }} </td>
                            <td class="px-6 py-6"> {{ $client->nomClient }} </td>
                            <td class="px-6 py-6"> {{ $client->soldeClient }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-10 flex justify-center bg-slate-600 text-slate-50 py-4">
            <p class="text-2xl font-bold">TRANSACTIONS</p>
        </div>
        <div class="flex w-full justify-between space-x-5 mt-10">
            <div class="card flex-1 py-5">
                <p class="text-blue-900 text-xl font-semibold mx-10">Liste de tous les retraits</p>
                <div class="m-10">
                    <table id="table_retrait">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th> N° Cheque </th>
                                <th> Montant </th>
                                <th> Date </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($retraits as $retrait)
                                <tr>
                                    <td class="">
                                        <span class="flex justify-center">
                                            {{ $retrait->id }}
                                        </span>
                                    </td>
                                    <td class="">
                                        <span class="flex justify-center">
                                            CHE0{{ $retrait->numCheque }}
                                        </span>
                                    </td>
                                    <td class="">
                                        <span class=" flex justify-start">
                                            {{ $retrait->montantRet }}
                                        </span>
                                    </td>
                                    <td> {{ $retrait->created_at }} </td>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card flex-1 py-5">
                <p class="text-blue-900 text-xl font-semibold mx-10">Liste de tous les versements</p>
                <div class="m-10">
                    <table id="table_versement">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th> N° Cheque </th>
                                <th> Montant </th>
                                <th> Date </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($versements as $versement)
                                <tr>
                                    <td class="">
                                        <span class="flex justify-center">
                                            {{ $versement->id }}
                                        </span>
                                    </td>
                                    <td class="">
                                        <span class="flex justify-center">
                                            CHE0{{ $versement->numCheque }}
                                        </span>
                                    </td>
                                    <td class="">
                                        <span class=" flex justify-start">
                                            {{ $versement->montantVerse }}
                                        </span>
                                    </td>
                                    <td> {{ $versement->created_at }} </td>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $('#table_retrait').DataTable();
                $('#table_versement').DataTable();
            })
        </script>
    </div>
@endsection
