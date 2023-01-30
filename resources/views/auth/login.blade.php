@extends('layouts.form')
@section('title', 'Login - WebMentor')
@section('content')
    <div class="h-[60vh] flex items-center justify-center">
        <form action="{{ route('login') }}" method="POST" class="w-[512px] bg-gray-200 p-6 rounded-md py-[40px] shadow-sm">
            @csrf
            <h2 class="text-3xl font-bold ml-2">Login Account!</h2>
            @if (session('failed'))
                <div class="mb-3 inline-flex w-full  overflow-hidden bg-white rounded-lg shadow-md"><div class="flex items-center justify-center w-12 bg-red-500"><svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z"></path></svg></div><div class="px-4 py-2 -mx-3"><div class="mx-3"><span class="font-semibold text-red-500">Error</span><p class="text-sm text-gray-600">{{ session('failed') }}</p></div></div></div>
            @endif
            <input type="email" name="email" placeholder="Email Address" autocomplete="off"
            class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('email')
                <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
            @enderror
            <input type="password" name="password" placeholder="Password" autocomplete="off"
            class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('password')
                <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
            @enderror
            <div class="flex ml-3">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-gray-600">Remember me</label>
            </div>
            <button class="bg-main text-white py-2 px-5 block mt-2 rounded-lg">Login</button>
        </form>
    </div>
@endsection