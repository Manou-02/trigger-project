@extends('layout.layout')


@section('content')
   {{ Auth::user()->name }}
@endsection
