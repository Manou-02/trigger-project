@extends('layout.app')


@section('content')
    <div class="">
        <div class="">
            <div class="container card flex w-fit mx-auto my-10 bg-gray-50 px-4 rounded-lg">
                <div class="mx-10">
                    <div class="flex flex-col justify-items-center items-center text-gray-500 text-center mx-auto my-5">
                        <img class="w-20 h-20 rounded-full" src="https://cdn-icons-png.flaticon.com/512/195/195488.png" alt="icons" srcset="">
                        <span class="text-lg font-bold">S'authentifier</span>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p class="text-red-600">
                                {{ $error }}
                            </p>
                        @endforeach
                    @endif
                    <form action="{{ route('login')}}" method="POST">
                        @csrf
                        <x-inputComponent
                            name="name"
                            type="text"
                            placeholder="Nom d'utilisateur"
                        >
                            <i class="fas fa-user-alt"></i>
                        </x-inputComponent>

                        <x-inputComponent
                            name="password"
                            type="password"
                            placeholder="Mot de passe"
                        >
                            <i class="fas fa-key"></i>
                        </x-inputComponent>

                        <button class="bg-sky-700 text-gray-50 text-sm py-2 px-4 rounded w-full  outline-none" type="submit"><i class="fas fa-unlock-alt" class="py-5"></i> Se connecter</button>
                    </form>
                    <div class="mt-4 flex justify-items-end mb-10">
                        <span class="text-gray-600">Vous n'avez pas de compte, <a href="{{ route('register') }}"><span class="text-blue-700">s'inscrire ?</span> </a> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
