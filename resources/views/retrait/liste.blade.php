@extends('layout.layout')

@section('content')
    <div class="sticky m-20">
        <div class="card p-20 mr-96">
            <h3 class="mb-4 text-blue-900 text-xl font-semibold">Liste de tous les retraits</h3>
            <table id="table" class="">
                <thead>
                    <th> #ID </th>
                    <th> N° Cheque </th>
                    <th> Client </th>
                    <th> Montant (Ar)</th>
                    <th> Actions </th>
                </thead>
                <tbody>
                    @foreach ($retraits as $retrait)
                        <tr>
                            <td> {{ $retrait->id }} </td>
                            <td> CH0{{ $retrait->numCheque }} </td>
                            <td> {{ $retrait->client->nomClient }} </td>
                            <td> {{ $retrait->montantRet }} </td>
                            <td class="space-x-5 flex items-center justify-center">
                                <button class="outline-none border-2 border-blue-600 text-blue-600 rounded px-4 py-2">
                                    <i class="fas fa-pencil-alt"></i>
                                    <span class="ml-2">Modifier</span>
                                </button>
                                <form action="" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce versement?')">
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
