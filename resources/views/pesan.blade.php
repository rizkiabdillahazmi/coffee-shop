@if ($message = Session::get('sukses'))
    <div class="max-w-md mx-auto animate-[pulse_2s_ease-in-out_infinite]">
        <div class="flex justify-start gap-5 px-3 py-2 items-center bg-white rounded-md relative shadow border-4 border-blue-500">
            <span class="close absolute right-0 top-0 hover:text-red-500 cursor-pointer text-slate-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </span>
            <div class="p-2 bg-blue-500 rounded-full text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                  </svg>
            </div>
            <div>
                <div class="font-bold text-lg">Success</div>
                <div>{{ $message }}</div>
            </div>
        </div>
    </div>
@endif

<script>
    const close_button = document.querySelector('.close');
    close_button.addEventListener('click', function(e) {
        e.preventDefault();
        const parent = close_button.parentElement;
        parent.style.display = 'none';
    }, false);
</script>