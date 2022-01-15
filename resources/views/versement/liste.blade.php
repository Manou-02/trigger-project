@extends('layout.layout')

@section('content')
    <div class="sticky m-20">
        <div class="card p-20 mr-96">
            <h3 class="mb-4 text-blue-900 text-xl font-semibold">Liste de tous les versements</h3>
            <table id="table" class="">
                <thead>
                    <th> #ID </th>
                    <th> N° Cheque </th>
                    <th> Client </th>
                    <th> Montant (Ar)</th>
                    <th> Actions </th>
                </thead>
                <tbody>
                    @foreach ($versements as $versement)
                        <tr>
                            <td> {{ $versement->id }} </td>
                            <td> CH0{{ $versement->numCheque }} </td>
                            <td> {{ $versement->client->nomClient }} </td>
                            <td> {{ $versement->montantVerse }} </td>
                            <td class="space-x-5 flex items-center justify-center">
                                <button class="outline-none border-2 border-blue-600 text-blue-600 rounded px-4 py-2">
                                    <i class="fas fa-pencil-alt"></i>
                                    <span class="ml-2">Modifier</span>
                                </button>
                                <form action="{{route('versement.destroy', $versement->id)}}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce versement?')">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="outline-none border-2 border-red-600 text-red-600 rounded px-4 py-2" >
                                        <i class="fas fa-trash-alt"></i>
                                        <span class="ml-2">Supprimer</span>
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
