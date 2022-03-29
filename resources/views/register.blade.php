@extends('layouts.main')
@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3 rounded-lg">
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
        <h3 class="text-2xl font-bold text-center">Daftar Sekarang</h3>
        <form action="{{ url('register') }}" method="POST">
            @csrf
            <div class="mt-4">
                <div>
                    <label class="block" for="Name">Nama<label>
                            <input type="text" placeholder="Nama" name="name" required value="{{ old('name') }}"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-green-600">
                </div>
                @error('name')
                <span class="text-xs text-red-400">{{ $message }}</span>
                @enderror
                <div class="mt-4">
                    <label class="block" for="username">Username<label>
                            <input type="text" placeholder="Username" name="username" required
                                value="{{ old('username') }}"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-green-600">
                </div>
                @error('username')
                <span class="text-xs text-red-400">{{ $message }}</span>
                @enderror
                <div class="mt-4">
                    <label class="block" for="email">Email<label>
                            <input type="text" placeholder="Email" name="email" required value="{{ old('email') }}"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-green-600">
                </div>
                @error('email')
                <span class="text-xs text-red-400">{{ $message }}</span>
                @enderror
                <div class="mt-4">
                    <label class="block">Password<label>
                            <input type="password" placeholder="Password" name="password" required
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-green-600">
                </div>
                @error('password')
                <span class="text-xs text-red-400">{{ $message }}</span>
                @enderror
                <div class="mt-4">
                    <label class="block">Konfirmasi Password<label>
                            <input type="password" placeholder="Password" name="password_confirmation" required
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-green-600">
                </div>
                @error('password_confirmation')
                <span class="text-xs text-red-400">{{ $message }}</span>
                @enderror
                <div class="flex">
                    <button type="submit"
                        class="w-full px-6 py-2 mt-4 text-white bg-green-600 rounded-lg hover:bg-green-700 font-bold">Buat
                        Akun</button>
                </div>
                <div class="mt-6 text-grey-dark">
                    Sudah Punya Akun?
                    <a class="text-green-600 hover:underline" href="/login">
                        Log in
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection