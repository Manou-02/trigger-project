@extends('layout.layout')

@section('content')
    <div class="sticky w-full m-20">
        <div class="container flex justify-around mt-40">
            <div class="menu p-10 cursor-pointer">
                <div class="text-3xl text-blue-900 font-bold">
                    <a href="{{ route('versement.create') }}">
                        <div class="flex flex-col justify-center items-center">
                            <i class="fas fa-plus-circle fa-2x"></i>
                            <span class="mt-5">Nouvelle versement.</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="menu p-10 cursor-pointer">
                <div class="text-3xl text-blue-900 font-bold">
                    <a href="{{ route('versement.liste') }}">
                        <div class="flex flex-col justify-center items-center">
                            <i class="fas fa-list-ul fa-2x"></i>
                            <span class="mt-5">Gérer les versements.</span>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection
