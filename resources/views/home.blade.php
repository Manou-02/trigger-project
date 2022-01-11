@extends('layout.layout')


@section('content')
<div class="sticky mt-4">
    {{ Auth::user()->name }}
</div>
@endsection
