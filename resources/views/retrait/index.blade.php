@extends('layout.layout')

@section('content')
    <div class="sticky">
        <div class="m-10">
            <h3 class="font-semibold text-xl italic">Liste de tous les Retraits</h3>
        </div>

        <div class="m-10">
            <button id="add_btn" class="bg-blue-900 text-slate-50 py-2 px-4 rounded outline-none hover:bg-indigo-800" >
                <i class="fas fa-plus-circle"></i>
                <span class="ml-2">Ajouter</span>
            </button>
        </div>
        <hr class="mx-10">


        <div class="container flex justify-between m-10">
            <div class="">
                Contenu du tableau
            </div>

            <div  id="add_page" class="hidden">
                <div class="add_page w-96 flex flex-col items-center h-auto py-5">
                    <div class="flex items-center mt-2 h-10 text-blue-900">
                        <i class="fas fa-plus-circle"></i>
                        <span class="text-lg ml-2">Nouveau retrait</span>
                    </div>
                    <div class="mx-4">
                        <form action="" method="POST">
                            @csrf
                            <x-inputComponent
                                name="nomClient"
                                type="text"
                                placeholder="Nom du client"
                            >
                                <i class="fas fa-user-alt"></i>
                            </x-inputComponent>

                            <x-inputComponent
                                name="soldeClient"
                                type="number"
                                placeholder="Solde initiale"
                            >
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
    <script>
        $('#add_btn').click(() =>{
            $('#add_page').toggle('hidden')
        })
        // $('#save_cli').click(() => {
        //     $('#add_page').addClass('hidden')
        // })
    </script>
@endsection
