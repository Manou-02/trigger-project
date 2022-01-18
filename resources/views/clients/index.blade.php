@extends('layout.layout')

@section('content')
    <div class="sticky">
        <div class="m-10">
            <h3 class="font-semibold text-xl italic">Clients</h3>
        </div>

        <div class="m-10">
            <button id="add_btn" class="bg-blue-900 text-slate-50 py-2 px-4 rounded outline-none hover:bg-indigo-800" >
                <i class="fas fa-plus-circle"></i>
                <span class="ml-2">Ajouter</span>
            </button>
        </div>


        <div class="container flex justify-between m-10">
            <div class="w-full">
                <div class="table my-4 p-10 w-full">
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
                                        <a href="{{ route('client.edit', $client->id)}}" class="text-blue-600 border-2 border-blue-600 px-4 py-2 space-x-2 rounded hover:bg-blue-600 hover:text-slate-50 text-sm">
                                            <span class="mr-2">
                                                <i class="fas fa-pencil-alt"></i>
                                            </span>
                                            <span>Modifier</span>
                                        </a>

                                        <form action="{{route('client.destroy', $client->id)}}" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer ce client?')">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="outline-none mx-4 text-red-600 border-2 border-red-600 px-4 py-2 rounded hover:bg-red-600 hover:text-slate-50 text-sm">
                                                <span class="mr-2">
                                                    <i class="fas fa-trash-alt"></i>
                                                </span>
                                                <span>Supprimer</span>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div  id="add_page" class=" ml-10 hidden">
                <div class="table py-10">

                    <div class=" w-96 flex flex-col items-center h-auto py-5">
                        <div class="flex items-center mt-2 h-10 text-blue-900">
                            <i class="fas fa-plus-circle"></i>
                            <span class="text-lg ml-2">Nouveau client</span>
                        </div>
                        <div class="mx-4">
                            @if ($errors->any())
                                <script>
                                    $('#add_page').removeClass('hidden')
                                </script>
                            @endif
                            <form action=" {{route('client.store')}} " method="POST">
                                @csrf
                                <x-inputComponent
                                    name="nomClient"
                                    type="text"
                                    placeholder="Nom du client"
                                >
                                    @error('nomClient')
                                        <p class="text-red-600"> {{ $message }} </p>
                                    @enderror
                                    <i class="fas fa-user-alt"></i>
                                </x-inputComponent>


                                <x-inputComponent
                                    name="soldeClient"
                                    type="number"
                                    placeholder="Solde initiale"
                                    color="bg-slate-50"
                                >
                                    @error('soldeClient')
                                        <p class="text-red-600"> {{ $message }} </p>
                                    @enderror

                                    <i class="fas fa-dollar-sign"></i>
                                </x-inputComponent>
                                <button class="bg-indigo-900 text-slate-50 px-4 py-2 rounded w-full outline-none my-5">
                                    <i class="fas fa-check-square"></i>
                                   <span id="save_cli" class="ml-2">Sauvegarder</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    <script>
        $('#add_btn').click(() =>{
            $('#add_page').toggle('hidden')
        })

        $(document).ready(function(){
            $('#client_table').DataTable();
        })

    </script>
@endsection
