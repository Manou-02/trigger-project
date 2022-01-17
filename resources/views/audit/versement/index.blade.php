@extends('layout.layout')

@section('content')
    <div class="sticky m-20 ">
        <h3 class="text-blue-900 text-xl font-semibold">Audit versements</h3>
        <div class="table my-4 p-10 w-full">
            <table id="table">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th> Type d'action </th>
                        <th> Date </th>
                        <th> N° versement </th>
                        <th> N° Compte </th>
                        <th> Nom du client </th>
                        <th> Ancien montant(Ar) </th>
                        <th> Nouveau Montant (Ar)</th>
                        <th> Utilisateur </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($auditVersements as $auditVersement)
                        <tr>
                            <td>
                                <span class="flex justify-center">
                                    {{ $auditVersement->id}}
                                </span>
                            </td>
                            <td>
                                <span class="flex justify-center">
                                    {{ $auditVersement->typeAction}}
                                </span>
                            </td>
                            <td>
                                <span class="flex justify-center">
                                    {{ $auditVersement->date}}
                                </span>
                            </td>
                            <td>
                                <span class="flex justify-center">
                                    {{ $auditVersement->numVerse}}
                                </span>
                            </td>
                            <td>
                                <span class="flex justify-center">
                                    COMP0{{ $auditVersement->client->id}}
                                </span>
                            </td>
                            <td>
                                <span class="flex justify-center">
                                    {{ $auditVersement->client->nomClient}}
                                </span>
                            </td>
                            <td>
                                <span class="flex justify-center">
                                    {{ $auditVersement->montantAncien}}
                                </span>
                            </td>
                            <td>
                                <span class="flex justify-center">
                                    {{ $auditVersement->montantNouv}}
                                </span>
                            </td>
                            <td>
                                <span class="flex justify-center">
                                    {{ $auditVersement->user->name}}
                                </span>
                            </td>

                            <td class="flex justify-center">

                                <form action="{{ route('audit.versement.destroy', $auditVersement->id) }}" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer ce audit compte?')" >
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
            $('#table').DataTable();
        })
    </script>
@endsection
