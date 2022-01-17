<div class="">
    <div class="w-1/4">
        <div class="mt-24 mx-5 font-bold text-slate-400 text-xl">
            <span>Dashboard</span>
        </div>

        <div class="">
            <ul class="list-none ml-8 my-5 text-zinc-700 cursor-pointer">
                <a href="{{ route('home') }}">
                    <li class="flex items-center pt-2 w-52 pl-2 py-2 rounded my-2 {{ Route::currentRouteName() === "home" ? "active" : "" }}">
                        <i class="fas fa-home"></i>
                        <span class="ml-4 text-lg font-normal">Accueil</span>
                    </li>
                </a>

                <a href="{{route('client.index')}}">
                    <li class="flex items-center pt-2 w-52 pl-2 py-2 rounded my-2 {{Str::substr(Route::currentRouteName(), 0, 6)  === "client" ? "active" : "" }} ">
                        <i class="fas fa-users"></i>
                        <span class="ml-4 text-lg font-normal">Client</span>
                    </li>
                </a>
                <li class="flex items-center -ml-3 mt-10 font-bold text-slate-400 text-base">
                    <i class="fas fa-exchange-alt"></i>
                    <span class="pl-4">Opérations</span>
                </li>
                <ul>
                    <a href="{{ route('versement.index') }}">
                        <li class="flex items-center pt-2 w-52 pl-2 py-2 rounded my-2 {{Str::substr(Route::currentRouteName(), 0, 6)  === "versem" ? "active" : "" }}">
                            <i class="fas fa-download"></i>
                            <span class="ml-4 text-lg font-normal">Versement</span>
                        </li>
                    </a>

                    <a href="{{ route('retrait.index') }}">
                        <li class="flex items-center pt-2 w-52 pl-2 py-2 rounded my-2 {{Str::substr(Route::currentRouteName(), 0, 6)  === "retrai" ? "active" : "" }}">
                            <i class="fas fa-share-square"></i>
                            <span class="ml-4 text-lg font-normal">Retrait</span>
                        </li>
                    </a>

                </ul>
                <li class="flex items-center -ml-3 mt-10 font-bold text-slate-400 text-base">
                    <i class="fas fa-eye"></i>
                    <span class="pl-4">Audit</span>
                </li>
                <ul>
                    <a href=" {{ route('operation.index') }} ">
                        <li class="flex items-center pt-2 w-52 pl-2 py-2 rounded my-2 {{Str::substr(Route::currentRouteName(), 0, 6)  === "operat" ? "active" : "" }}">
                            <i class="fas fa-exchange-alt"></i>
                            <span class="ml-4 text-lg font-normal">Opérations</span>
                        </li>
                    </a>

                    <a href=" {{route('audit.versement.index')}} ">
                        <li class="flex items-center pt-2 w-52 pl-2 py-2 rounded my-2 {{Str::substr(Route::currentRouteName(), 0, 7)  === "audit.v" ? "active" : "" }}">
                            <i class="fas fa-download"></i>
                            <span class="ml-4 text-lg font-normal">Versement</span>
                        </li>
                    </a>

                    <a href=" {{route('audit.retrait.index')}} ">
                        <li class="flex items-center pt-2 w-52 pl-2 py-2 rounded my-2 {{Str::substr(Route::currentRouteName(), 0, 7)  === "audit.r" ? "active" : "" }}">
                            <i class="fas fa-share-square"></i>
                            <span class="ml-4 text-lg font-normal">Retrait</span>
                        </li>
                    </a>

                    <a href=" {{route('compte.index')}} ">
                        <li class="flex items-center pt-2 w-52 pl-2 py-2 rounded my-2 {{Str::substr(Route::currentRouteName(), 0, 6)  === "compte" ? "active" : "" }}">
                            <i class="fas fa-users"></i>
                            <span class="ml-4 text-lg font-normal">Compte</span>
                        </li>
                    </a>
                </ul>
            </ul>
        </div>
    </div>
</div>
