@extends('layout.app')


@section('content')
    <div class="">
        <div class="">
            <div class="card container flex w-fit mx-auto my-10 bg-gray-50 px-4 rounded-lg">
                <div class="mx-10">
                    <div class="flex flex-col justify-items-center text-gray-500 text-center mx-auto my-5">
                        <i class="fas fa-user-circle fa-3x" class="text-lg"></i>
                        <span class="text-lg font-bold">S'inscrire</span>
                    </div>
                    <form action="{{ route('register')}}" method="POST">
                        @csrf

                        <x-inputComponent
                            name="name"
                            type="text"
                            placeholder="Nom d'utilisateur"
                        >
                            <i class="fas fa-user-alt"></i>
                        </x-inputComponent>


                        <x-inputComponent
                            name="email"
                            type="email"
                            placeholder="E-mail"
                        >
                            <i class="far fa-envelope"></i>
                        </x-inputComponent>

                        <x-inputComponent
                            name="password"
                            type="password"
                            placeholder="Mot de passe"
                        >
                            <i class="fas fa-key"></i>
                        </x-inputComponent>

                        <x-inputComponent
                            name="password_confirmation"
                            type="password"
                            placeholder="Confirmer votre mot de passe"
                        >
                            <i class="fas fa-key"></i>
                        </x-inputComponent>


                        <button class="bg-sky-700 text-gray-50 text-sm py-2 px-4 rounded w-full  outline-none" type="submit"><i class="fas fa-unlock-alt" class="py-5"></i> S'enregistrer</button>
                    </form>
                    <div class="mt-4 flex justify-items-end mb-10">
                        <span class="text-gray-600">Vous avez deja un compte, <a href="{{ route('login') }}"><span class="text-blue-700">s'authentifier ?</span> </a> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
