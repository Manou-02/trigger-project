<div class="sticky mt-0">
    <div class="header w-full flex items-center justify-between pl-10 pr-20 py-6 bg-gray-50 mt-0 z-1">
        <div class="-ml-60">
            <span class="font-bold italic text-2xl text-blue-900 cursor-pointer">
                <span>transactions</span>
                <span class="text-4xl"> Bancaires</span>
                <hr class="-ml-20 w-40">
            </span>

        </div>
        <div class="mr-10">
            <button class="outline-none">
                <div class="flex items-center cursor-pointer" id="btn_logout">
                    <span class="text-slate-800 mx-4"><i class="fas fa-user-circle fa-2x"></i></span>
                    <span class=""> {{ Auth::user()->name }} </span>
                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        </div>
    </div>

    <div class="flex items-center justify-end mr-6 z-99 -mt-4 cursor-pointer">
        <div class="btn-logout hidden rounded py-2 px-4" id="btn_toggle">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="mr-2 font-semibold text-lg my-2 mx-4">Logout</span>
                    <i class="fas fa-sign-out-alt mr-4"></i>
                </a>
            </form>
        </div>
    </div>
</div>


<script>
    $('#btn_logout').click(() => {
        $('#btn_toggle').toggle('hidden')
    })
    $('body').click(() => {
        $('#btn_toggle').addClass('hidden')
    })
</script>
