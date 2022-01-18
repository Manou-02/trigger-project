@extends('layout.layout')


@section('content')
<div class="sticky m-10">
    {{ Auth::user()->name }}
    <p>Page d'accueil de l'application</p>
</div>
@endsection
