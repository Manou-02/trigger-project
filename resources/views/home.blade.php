@extends('layout.layout')


@section('content')
<div class="sticky mx-10 my-20">

    <div class="flex justify-around mr-80">
        <div class="card w-80 py-10 px-10">
            <div class="flex justify-between pr-10">
                <div class="">
                    <p class="text-4xl text-blue-900 font-bold"> {{ $client }} </p>
                    <p class="text-xl font-semibold">Clients</p>
                </div>
                <div class="text-blue-900">
                    <i class="fas fa-arrow-up fa-3x"></i>
                </div>
            </div>
        </div>

        <div class="card w-80 py-10 px-10">
            <div class="flex justify-between pr-10">
                <div class="">
                    <p class="text-4xl text-blue-900 font-bold"> {{$versement}} </p>
                    <p class="text-xl font-semibold">Versements</p>
                </div>
                <div class="text-blue-900">
                    <i class="fas fa-arrow-up fa-3x"></i>
                </div>
            </div>
        </div>

        <div class="card w-80 py-10 px-10">
            <div class="flex justify-between pr-10">
                <div class="">
                    <p class="text-4xl text-blue-900 font-bold"> {{ $retrait }} </p>
                    <p class="text-xl font-semibold">Retraits</p>
                </div>
                <div class="text-blue-900">
                    <i class="fas fa-arrow-up fa-3x"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
