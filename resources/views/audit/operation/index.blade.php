@extends('layout.layout')

@section('content')
    <div class="sticky m-20 ">
        <h3 class="text-blue-900 text-xl font-semibold">Audit Operations</h3>
        <div class="table my-4 p-10 w-full">
            <table id="client_table">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th> Type d'action </th>
                        <th> Date </th>
                        <th> N° Cheque </th>
                        <th> N° Compte </th>
                        <th> Nom du client </th>
                        <th> Montant </th>
                        <th> Utilisateur </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($auditOperations as $auditOperation)
                        <tr>
                            <td class="">
                                <span class="flex justify-center">
                                    {{ $auditOperation->id }}
                                </span>
                            </td>

                            <td class="">
                                <span class="flex justify-center">
                                    {{ $auditOperation->typeAction }}
                                </span>
                            </td>
                            <td class="">
                                <span class="flex justify-center">
                                    {{ $auditOperation->date }}
                                </span>
                            </td>
                            <td class="">
                                <span class="flex justify-center">
                                    CHE0{{ $auditOperation->numCheque }}
                                </span>
                            </td>
                            <td class="">
                                <span class="flex justify-center">
                                    COMP0{{ $auditOperation->client->id }}
                                </span>
                            </td>
                            <td class="">
                                <span class="flex justify-center">
                                    {{ $auditOperation->client->nomClient }}
                                </span>
                            </td>
                            <td class="">
                                <span class="flex justify-center">
                                    {{ $auditOperation->montant }}
                                </span>
                            </td>
                            <td class="">
                                <span class="flex justify-center">
                                    {{ $auditOperation->user->name }}
                                </span>
                            </td>



                            <td class="flex justify-center">

                                <form action="{{ route('operation.destroy', $auditOperation->id) }}" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer ce audit compte?')" >
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
    <script>
        $(document).ready(function(){
            $('#client_table').DataTable();
        })
    </script>
@endsection
