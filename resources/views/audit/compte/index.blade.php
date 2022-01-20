@extends('layout.layout')

@section('content')
    <div class="sticky m-20 ">
        <h3 class="text-blue-900 text-xl font-semibold">Audit compte</h3>

        <div class="">
            <div class="table my-4 p-10 w-full">
                <table id="client_table">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th> Type d'action </th>
                            <th> N° compte </th>
                            <th> Nom du client </th>
                            <th> Solde ancier (Ar) </th>
                            <th> Solde nouveau (Ar) </th>
                            <th> Utilisateur </th>
                            <th> Date </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($auditComptes as $auditCompte)
                            <tr>
                                <td class="">
                                    <span class="flex justify-center">
                                        {{ $auditCompte->id }}
                                    </span>
                                </td>

                                <td class="">
                                    <span class=" flex justify-start">
                                        {{ $auditCompte->typeAction }}
                                    </span>
                                </td>
                                <td class="">
                                    <span class="flex justify-center">
                                        COMP0{{ $auditCompte->numCompte }}
                                    </span>
                                </td>
                                <td class="">
                                    <span class=" flex justify-start">
                                        {{ $auditCompte->nomClient }}
                                    </span>
                                </td>
                                <td class="">
                                    <span class=" flex justify-start">
                                        {{ $auditCompte->soldeAncien }}
                                    </span>
                                </td>

                                <td class="">
                                    <span class=" flex justify-start">
                                        {{ $auditCompte->soldeNouveau }}
                                    </span>
                                </td>
                                <td class="">
                                    <span class=" flex justify-start">
                                        {{ $auditCompte->user->name }}
                                    </span>
                                </td>

                                <td class="">
                                    <span class=" flex justify-start">
                                        {{ $auditCompte->date }}
                                    </span>
                                </td>

                                <td class="flex justify-center">

                                    <form action=" {{ route('compte.destroy', $auditCompte->id) }} " method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer ce audit compte?')" >
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
    </div>
    <script>
        $(document).ready(function(){
            $('#client_table').DataTable();
        })
    </script>
@endsection
