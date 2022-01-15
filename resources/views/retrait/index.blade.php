@extends('layout.layout')

@section('content')
    <div class="sticky w-full m-20">
        <div class="container flex justify-around mt-40">
            <a href=" {{ route('retrait.create') }} ">
                <div class="menu p-10 cursor-pointer">
                    <div class="text-3xl text-blue-900 font-bold">
                        <div class="flex flex-col justify-center items-center">
                            <i class="fas fa-plus-circle fa-2x"></i>
                            <span class="mt-5">Nouvelle retrait.</span>
                        </div>
                    </div>
                </div>
            </a>

            <a href=" {{route('retrait.liste')}} ">
                <div class="menu p-10 cursor-pointer">
                    <div class="text-3xl text-blue-900 font-bold">
                        <div class="flex flex-col justify-center items-center">
                            <i class="fas fa-list-ul fa-2x"></i>
                            <span class="mt-5">Gérer les retraits.</span>
                        </div>
                    </div>
                </div>
            </a>

        </div>
    </div>
@endsection
