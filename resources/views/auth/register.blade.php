@extends('layout.app')


@section('content')
    <div class="">
        <div class="">
            <div class="card container flex w-fit mx-auto my-10 bg-gray-50 px-4 rounded-lg">
                <div class="mx-10">
                    <div class="flex flex-col justify-items-center items-center text-gray-500 text-center mx-auto my-5">
                        <img class="w-20 h-20 rounded-full" src="https://cdn-icons-png.flaticon.com/512/195/195488.png" alt="icons" srcset="">
                        <span class="text-lg font-bold">S'inscrire</span>
                    </div>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p class="text-red-600">
                                {{ $error }}
                            </p>
                        @endforeach
                    @endif
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

                        <div class="flex flex-col my-10 py-3">
                            <div class=" flex justify-center items-center text-gray-500 font-semibold">
                                <span>Status utilisateur</span>
                            </div>
                            <div class="shadow-lg rounded bg-inherit px-4 text-gray-500 flex flex-row space-x-4 py-6 ">
                                <div class="w-5 text-gray-500">
                                    <i class="fas fa-user-alt"></i>
                                </div>
                                <select name='admin' class="outline-none rounded bg-inherit flex-1 w-full">
                                    <option value="false" class="outline-none" selected>Utilisateur</option>
                                    <option value="true" class="">Administrateur</option>
                                </select>
                            </div>
                        </div>

                        <button class="bg-sky-700 text-gray-50 text-sm py-2 px-4 rounded w-full  outline-none" type="submit"><i class="fas fa-unlock-alt" class="py-5"></i> S'enregistrer</button>
                    </form>
                    <div class="mt-4 flex justify-items-end mb-10">
                        <span class="text-gray-600">Vous avez déjà un compte, <a href="{{ route('login') }}"><span class="text-blue-700">s'authentifier ?</span> </a> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
