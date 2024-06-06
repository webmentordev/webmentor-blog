<div class="w-full sticky top-0 z-10 shadow-sm">
    <nav class="w-full bg-white">
        <div class="max-w-[95%] m-auto flex justify-between items-center py-2 px-4">
            <a class="flex items-center text-dark text-lg font-bold"  href="{{ route('home') }}"><img class="w-[40px] mr-2" src="{{ asset('images/logo.png') }}" alt="WebMentor Logo">WebMentor</a>
            <ul class="respon1-1:hidden flex items-center">
                <a  class="font-semibold px-5 @if(Request::is('/')) text-main @endif" href="{{ route('home') }}">Home</a>
                <a  class="font-semibold px-5 @if(Request::is('blog')) text-main @endif" href="{{ route('blog') }}">Blogs</a>
                {{-- <a  class="font-semibold px-5 @if(Request::is('courses')) text-main @endif" href="{{ route('courses') }}">Courses</a> --}}
                <a  class="font-semibold px-5 @if(Request::is('about')) text-main @endif" href="{{ route('about') }}">About</a>
                <div class="relative group">
                    <nav class="font-semibold px-5">Categories <i class="fas fa-caret-down ml-1"></i></nav>
                    <ul class="absolute bg-gray-900 p-3 py-5 text-start -left-[80px] top-6 shadow-lg flex-col w-[200px] hidden group-hover:flex rounded-lg">
                        @foreach ($navbarlinks as $item)
                            @if($loop->last)
                                <a class="font-semibold px-3 text-sm inline-block text-white" href="{{ route('blog.category', $item->slug) }}">{{ $item->title }}</a>
                            @else
                                <a class="font-semibold px-3 mb-2 text-sm inline-block text-white" href="{{ route('blog.category', $item->slug) }}">{{ $item->title }}</a>
                            @endif
                        @endforeach
                    </ul>
                </div>
                @auth
                    <a class="font-semibold px-5 border-l border-1 border-gray-300 @if(Request::is('admin/dashboard')) text-main @endif" href="{{ route('dashboard') }}">Dashboard</a> 
                @endauth
                <a  class="bg-main bg-opacity-10 text-main font-bold py-2 px-4 rounded-lg" href="{{ route('contact') }}">Contact</a>
            </ul>
            <div class="hidden respon1-1:flex items-center" x-data="{ open: false }" x-cloak>
                <button x-on:click="open = ! open">
                    <ul>
                        <li class="h-[2px] my-[5px] bg-gray-800 w-[40px]"></li>
                        <li class="h-[2px] my-[5px] bg-gray-800 w-[40px]"></li>
                        <li class="h-[2px] my-[5px] bg-gray-800 w-[40px]"></li>
                    </ul>
                </button>
                <div x-show="open" x-transition class="fixed bg-white opacity-95 top-0 left-0 w-full h-screen flex justify-center items-center" x-on:click="open = ! open">
                    <ul class="flex flex-col text-center">
                        <a  class="text-gray-800 font-semibold px-5 my-3 @if(Request::is('/')) text-main @endif" href="{{ route('home') }}">Home</a>
                        <a  class="text-gray-800 font-semibold px-5 my-3 @if(Request::is('blog')) text-main @endif" href="{{ route('blog') }}">Blogs</a>
                        <a  class="text-gray-800 font-semibold px-5 my-3 @if(Request::is('courses')) text-main @endif" href="{{ route('courses') }}">Courses</a>
                        <a  class="text-gray-800 font-semibold px-5 my-3 @if(Request::is('about')) text-main @endif" href="{{ route('about') }}">About</a>
                        @foreach ($navbarlinks as $item)
                            @if($loop->last)
                                <a class="text-gray-800 font-semibold px-5 my-3" href="{{ route('blog.category', $item->slug) }}">{{ $item->title }}</a>
                            @else
                                <a class="text-gray-800 font-semibold px-5 my-3" href="{{ route('blog.category', $item->slug) }}">{{ $item->title }}</a>
                            @endif
                        @endforeach
                        @auth
                            <a class="text-gray-800 font-semibold px-5 my-3 @if(Request::is('admin/dashboard')) text-main @endif" href="{{ route('dashboard') }}">Dashboard</a> 
                        @endauth
                        <a  class="bg-main bg-opacity-10 text-main font-bold py-2 px-4 rounded-lg my-3" href="{{ route('contact') }}">Contact</a>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    @auth
        <div class="bg-gray-100 w-full py-2 px-4 flex justify-between items-center">
            <ul class="max-w-[95%]">
                <a class="font-semibold px-3 text-sm" href="{{ route('contactdata') }}">Contacts</a>
                <a class="font-semibold px-3 text-sm" href="{{ route('blog') }}">Blogs</a>
                <a class="font-semibold px-3 text-sm" href="{{ route('categories') }}">Categories</a>
                <a class="font-semibold px-3 text-sm" href="{{ route('courses.data') }}">Courses</a>
            </ul>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="bg-main bg-opacity-10 text-main font-bold py-1 px-4 rounded-lg my-1">Logout</button>
            </form>
        </div>
    @endauth
</div>
