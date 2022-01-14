<div>
    <button id="delete_btn" class=" outline-none">
        <span class="mx-4 text-red-600">
            <i class="fas fa-trash-alt"></i>
        </span>
    </button>
    <div id="delete_modal" class="hidden">
        <div id="" class="bg-black inset-0 absolute bg-opacity-50 flex h-auto flex-col justify-center items-center">
              <div class="bg-slate-50 w-80 rounded-lg py-4 px-4">
                    <div class="mb-2">
                          <span class="text-sm font-bold">Confirm to delete</span>
                    </div>
                    <div class="">
                          <p>Are you really sure to delete this file?</p>
                    </div>
                    <div class="flex justify-end mt-4 space-x-3">
                          <button id="cancel_btn" class="border-2 border-blue-600 rounded text-blue-600 text-sm py-1 px-4 outline-none hover:bg-blue-600 hover:text-slate-50">Cancel</button>
                          <button class="border-2 border-red-600 rounded text-red-600 text-sm py-1 px-4 outline-none hover:bg-red-600 hover:text-slate-50">Delete</button>
                    </div>
              </div>
        </div>
  </div>

  <script>
        $("#delete_btn").click(() => {
              $('#delete_modal').toggle('hidden');
        })
        $('#cancel_btn').click(() => {
              $('#delete_modal').toggle('hidden');
        })
  </script>
</div>
