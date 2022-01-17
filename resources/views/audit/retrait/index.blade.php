@extends('layout.layout')

@section('content')
    <div class="sticky m-20 ">
        <h3 class="text-blue-900 text-xl font-semibold">Audit retraits</h3>

    </div>
    <script>
        $(document).ready(function(){
            $('#client_table').DataTable();
        })
    </script>
@endsection
