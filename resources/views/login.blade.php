@extends('layouts.main')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg rounded-lg">
        <div class="flex justify-center">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-blue-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                <path
                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
            </svg> --}}
        </div>
        <div class="mb-2">
            @include('notifikasi')
        </div>
        <h3 class="text-2xl font-bold text-center">Silahkan Login</h3>
        <form action="/login" method="post">
            @csrf
            <div class="mt-4 w-96">
                <div>
                    <label class="block" for="username">Username or Email<label>
                            <input type="text" placeholder="Username or Email" name="username" autofocus required
                                value="{{ old('username') }}"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-green-600">
                            @error('username')
                            <span class="text-xs tracking-wide text-red-600">{{ $message }}</span>
                            @enderror
                </div>
                <div class="mt-4">
                    <label class="block" for="password">Password<label>
                            <input type="password" placeholder="Password" name="password" required
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-green-600">
                </div>
                <div class="flex items-baseline justify-between">
                    <button
                        class="px-6 py-2 mt-4 text-white font-bold bg-green-600 rounded-lg hover:bg-green-700">Login</button>
                    <a href="#" class="text-sm text-green-600 hover:underline">Lupa Password?</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection