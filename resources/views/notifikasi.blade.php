@if ($message = Session::get('sukses'))
    <div class="max-w-md mx-auto animate-[pulse_2s_ease-in-out_infinite]">
        <div class="flex justify-start gap-5 px-3 py-2 items-center bg-white rounded-md relative shadow border-4 border-green-500">
            <span class="close absolute right-0 top-0 hover:text-red-500 cursor-pointer text-slate-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </span>
            <div class="p-2 bg-green-500 rounded-full text-white">
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

@if ($message = Session::get('warning'))
    <div class="max-w-md mx-auto animate-[pulse_2s_ease-in-out_infinite]">
        <div class="flex justify-start gap-5 px-3 py-2 items-center bg-white rounded-md relative shadow border-4 border-yellow-500">
            <span class="close absolute right-0 top-0 hover:text-red-500 cursor-pointer text-slate-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </span>
            <div class="text-yellow-500 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                  </svg>
            </div>
            <div>
                <div class="font-bold text-lg">Peringatan</div>
                <div>{{ $message }}</div>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('gagal'))
    <div class="max-w-md mx-auto animate-[pulse_2s_ease-in-out_infinite]">
        <div class="flex justify-start gap-5 px-3 py-2 items-center bg-white rounded-md relative shadow border-4 border-red-500">
            <span class="close absolute right-0 top-0 hover:text-red-500 cursor-pointer text-slate-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </span>
            <div class="text-red-500 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
            </div>
            <div>
                <div class="font-bold text-lg">Gagal</div>
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

    close_button
</script>