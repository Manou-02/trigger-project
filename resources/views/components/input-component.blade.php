<div>
    <div class="flex flex-col my-10">
        <div class="shadow-lg rounded px-4 text-gray-500  py-3">
            {{ $slot }}
            <input type={{ $type }} id="{{ $name }}" name="{{ $name }}" class="outline-none rounded bg-inherit  py-3 px-4" placeholder="{{ $placeholder }}" />
        </div>
    </div>
</div>
