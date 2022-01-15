@extends('layout.layout')

@section('content')
    <div class="m-20 sticky flex flex-col items-center">
        <div class="flex flex-col">
            <span class="text-blue-900 text-3xl font-bold my-5">Retrait</span>

        </div>
        <div class="w-full mx-20">
            <table id="client_table">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th> N° Client </th>
                        <th> Nom </th>
                        <th> Solde (Ar) </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td class="">
                                <span class="flex justify-center">
                                    {{ $client->id }}
                                </span>
                            </td>
                            <td class="">
                                <span class="flex justify-center">
                                    CLI0{{ $client->id }}
                                </span>
                            </td>
                            <td class="">
                                <span class=" flex justify-start">
                                    {{ $client->nomClient }}
                                </span>
                            </td>
                            <td> {{ $client->soldeClient }} </td>
                            <td class="flex justify-center">
                                <a href=" {{ route('retrait.create.details', $client->id) }} " class="text-blue-600 border-2 border-blue-600 px-4 py-2 space-x-2 rounded hover:bg-blue-600 hover:text-slate-50 text-sm">
                                    <span class="mr-2">
                                        <i class="fas fa-download"></i>
                                    </span>
                                    <span>Retrait</span>
                                </a>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script>
            $(document).ready(function(){
                $('#client_table').DataTable();
            })
        </script>

    </div>
@endsection
