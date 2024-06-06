@extends('layouts.apps')
@section('title', 'Blogs - WebMentor')
@section('content')
<div class="py-2">
    <div class="py-5 max-w-7xl m-auto px-2">
        <h1 class="font-bold text-[50px] mb-3 leading-[65px] text-center">Blogs</h1>
        <form action="{{ route('blog.search') }}" method="get" class="flex ">
            <input type="search" id="search" name="search" placeholder="Search by title.." autocomplete="off"
            class="w-full bg-white mr-2 rounded border border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            <button class="bg-main py-2 px-4 text-white font-semibold rounded-md">Search</button>
        </form>

        <div class="grid grid-cols-4 py-4 gap-3 respon1:grid-cols-3 respon2:grid-cols-2 respon3:grid-cols-1">
            @if (count($blogs) && $blogs != null)
                @foreach ($blogs as $item)
                    <a href="{{ route('blog.slug',$item->slug) }}" class="p-2 mb-4 h-fit" loading="lazy" title="{{ $item->title }}">
                        <img src="{{ asset('storage/'.$item->small_thumb) }}" class="rounded-lg mb-2 w-full" alt="{{ $item->title }} Image">
                        <p class="text-gray-500 text-sm">{{ $item->category->title }} - {{ $item->created_at->format('M d, Y') }}</p>
                        <h3 class="my-3">{{ $item->title }}</h3>
                        <span class="text-main font-semibold bg-main bg-opacity-10 py-2 px-4 rounded-md">Read article</span>
                    </a>
                @endforeach
            @else
                <p class="text-center">No Blog exist with following name</p>
            @endif
        </div>
        @if ($blogs->hasPages())
            <div class="py-2">
                {{ $blogs->links() }}
            </div>
        @endif
    </div>
    <x-youtube_section />
</div>
@endsection