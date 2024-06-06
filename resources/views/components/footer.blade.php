<footer class="bg-gray-100 mt-4">
    <div class="py-[50px] max-w-7xl m-auto grid grid-cols-5 gap-[40px] px-4 respon0:grid-cols-3 respon1-1:grid-cols-2 respon3:grid-cols-1">
        <div class="w-full col-span-2 respon0:col-span-1">
            <h3 class="font-bold mb-3">About WebMentor</h3>
            <p class="leading-8 mb-2">WebMentor is a YouTube Content Creator, Systems Engineer and Full Stack Web Developer. WebMentor write blogs related to Web Development, System Administration, Gaming & Guides for solving real-world case problems.</p>
        </div>
        <div class="w-full">
            <h3 class="font-bold mb-3">Navigation Links</h3>
            <ul class="flex flex-col">
                <a class="mb-3 transition-all hover:ml-3 hover:transition-all" href="{{ route('home') }}">Home</a>
                <a class="mb-3 transition-all hover:ml-3 hover:transition-all" href="{{ route('blog') }}">Blogs</a>
                <a class="mb-3 transition-all hover:ml-3 hover:transition-all" href="{{ route('about') }}">About</a>
                <a class="mb-3 transition-all hover:ml-3 hover:transition-all" href="{{ route('contact') }}">Contact</a>
                <a class="mb-3 transition-all hover:ml-3 hover:transition-all" href="{{ route('courses') }}">Courses</a>
            </ul>
        </div>
        @if (count($footerlinks) && $footerlinks != null)
            <div class="w-full">
                <h3 class="font-bold mb-3">Blog Categories</h3>
                <ul class="flex flex-col">
                    @foreach ($footerlinks as $item)
                        <a class="mb-3 transition-all hover:ml-3 hover:transition-all" href="{{ route('blog.category', $item->slug) }}">{{ $item->title }}</a>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="w-full">
            <h3 class="font-bold mb-3">More</h3>
            <ul class="flex flex-col">
                <p class="text-main flex items-center mb-3"><i class="fas fa-envelope mr-1"></i> contact@webmentordev.online</p>
                <a href="{{ route('privacy.policy') }}" class="text-blue-500 underline mr-2 mb-3">Privacy Policy</a>
                <a href="{{ route('terms.of.service') }}" class="text-blue-500 underline mb-3">Terms Of Service</a>
            </ul>
        </div>
    </div>
    <div class="bg-gray-200 p-6 w-full flex justify-between items-center respon2:flex-col respon2:text-center">
        <p class="respon2:mb-3">Copyrights &copy; {{ date('Y') }} All Reserved. Created By <a class="text-main underline font-semibold" href="https://www.fiverr.com/mahmer97" target="_blank">M.Ahmer</a></p>
        <ul>
            <a href="https://youtube.com/c/webmentordev" class="ml-5" target="_blank"><i class=" p-3 bg-white rounded-full fab fa-youtube"></i></a>
            <a href="https://twitter.com/webmentordev" class="ml-5" target="_blank"><i class=" p-3 bg-white rounded-full fab fa-twitter"></i></a>
            <a href="https://www.linkedin.com/in/muhammad-ahmer-tahir-%E2%80%8B-a00748136/" class="ml-5" target="_blank"><i class=" p-3 bg-white rounded-full fab fa-linkedin"></i></a>
        </ul>
    </div>
</footer>