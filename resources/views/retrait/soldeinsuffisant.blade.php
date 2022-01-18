@extends('layout.layout')

@section('content')
    <div class="w-full h-full bg-black bg-opacity-5">
        <div class="sticky flex justify-center">
            <div class="card flex justify-center items-center my-20">
                <div class="m-10">
                    <div class="flex justify-center text-red-600">
                        <i class="far fa-times-circle fa-5x"></i>
                    </div>
                    <div class="flex justify-center mb-2">
                        <p class="text-2xl font-bold">Solde insuffisant</p>
                    </div>
                    <div class="flex space-x-5">
                        <div class="card px-4">
                            <p class="text-lg font-semibold">Solde actuel</p>
                            <p class="flex justify-center text-blue-900"> {{ $actuel }} Ar </p>
                        </div>
                        <div class="card px-4">
                            <p class="text-lg font-semibold">Solde demandé</p>
                            <p class="flex justify-center text-red-600"> {{ $demande }} Ar </p>
                        </div>
                    </div>
                    <div class="flex justify-between mt-10">
                        <a href=" {{ route('retrait.create') }} " class="bg-red-600 text-white font-semibold px-4 py-2 rounded">Annuler</a>
                        <a href=" {{ route('retrait.create.details', $client->id) }} " class="bg-blue-700 text-white font-semibold  px-4 py-2 rounded">Rectifier</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
