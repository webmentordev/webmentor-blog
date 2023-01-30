<div class="p-4 py-7">
    <header class="grid grid-cols-2 gap-3 max-w-7xl m-auto respon2-2:grid-cols-1">
        @if(count($featured) && $featured != null)
            @foreach ($featured as $feature)
                <div class="w-full h-full relative">
                    <img src="{{ asset('storage/'.$feature->small_thumb) }}" class="rounded-lg w-full" alt="featured_blog_image">
                    <span class="absolute top-2 left-2 bg-white bg-opacity-50 p-1 px-3 rounded-md font-bold">Featured</span>
                </div>
                <div class="p-3 flex items-center">
                    <div class="info">
                        <p class="text-gray-400 mb-3">{{ $feature->category->title }} - {{ $feature->created_at->format('M d, Y') }}</p>
                        <h1 class="font-bold text-[3.2vw] mb-3 leading-[65px] respon1:text-[3.3vw] respon1:leading-[50px] respon2-2:text-[5.3vw] respon4:text-[7.3vw] respon4:leading-[40px]">{{ $feature->title }}</h1>
                        <a class="text-main font-semibold bg-main bg-opacity-10 py-2 px-4 rounded-md" href="{{ route('blog.slug', $feature->slug) }}">Read article</a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="w-full h-full relative">
                <img src="{{ asset('blog_header/blog_1.png') }}" class="rounded-lg w-full" alt="blog_featured_image">
                <span class="absolute top-2 left-2 bg-white bg-opacity-50 p-1 px-3 rounded-md font-bold">New</span>
            </div>
            <div class="p-3 flex items-center">
                <div class="info">
                    <p class="text-gray-400 mb-3">eCommerce - December 18, 2022</p>
                    <h1 class="font-bold text-[3.2vw] mb-3 leading-[65px] respon1:text-[3.3vw] respon1:leading-[50px] respon2-2:text-[5.3vw] respon4:text-[7.3vw] respon4:leading-[40px]">How to handle shipping and delivery during a world-wide pandemic</h1>
                    <a class="text-main font-semibold bg-main bg-opacity-10 py-2 px-4 rounded-md" href="#">Read article</a>
                </div>
            </div>
        @endif
    </header>
    
    <div class="py-6 border-b border-1 border-gray-300 max-w-7xl m-auto">
        <h2 class="text-[30px] font-bold ml-3">Latest Blogs</h2>
        <div class="grid grid-cols-4 py-4 gap-3 respon1:grid-cols-3 respon2:grid-cols-2 respon3:grid-cols-1">
            @if (count($blogs) && $blogs != null)
                @foreach ($blogs as $item)
                    <div class="p-2 mb-4 h-fit" data-aos="zoom-in" loading="lazy">
                        <img src="{{ asset('storage/'.$item->small_thumb) }}" class="rounded-lg mb-2" alt="blog">
                        <p class="text-gray-400 text-sm">{{ $item->category->title }} - {{ $item->created_at->format('M d, Y') }}</p>
                        <h3 class="my-3">{{ $item->title }}</h3>
                        <a class="text-main font-semibold bg-main bg-opacity-10 py-2 px-4 rounded-md" href="{{ route('blog.slug', $item->slug) }}">Read article</a>
                    </div>
                @endforeach
            @else
                <div class="p-2 mb-4 h-fit" data-aos="zoom-in" loading="lazy">
                    <img src="{{ asset('blog_header/blog_1.png') }}" class="rounded-lg mb-2" alt="blog">
                    <p class="text-gray-400 text-sm">NoData</p>
                    <h3 class="my-3">NoData</h3>
                    <a class="text-main font-semibold bg-main bg-opacity-10 py-2 px-4 rounded-md" href="#">NoData</a>
                </div>
            @endif
        </div>
    </div>
    <div class="py-6 border-b border-1 border-gray-200 max-w-7xl m-auto">
        <h2 class="text-[30px] font-bold ml-3">Web Development Blogs</h2>
        <div class="grid grid-cols-3 py-4 gap-3 respon2:grid-cols-2 respon3:grid-cols-1">
            @if (count($web) && $web != null)
                @foreach ($web as $item)
                    <div class="p-2 mb-4 h-fit" data-aos="zoom-in" loading="lazy">
                        <img src="{{ asset('storage/'.$item->small_thumb) }}" class="rounded-lg mb-2 w-full" alt="blog">
                        <p class="text-gray-400 text-sm">{{ $item->category->title }} - {{ $item->created_at->format('M d, Y') }}</p>
                        <h3 class="my-3">{{ $item->title }}</h3>
                        <a class="text-main font-semibold bg-main bg-opacity-10 py-2 px-4 rounded-md" href="{{ route('blog.slug', $item->slug) }}">Read article</a>
                    </div>
                @endforeach
            @else
                <div class="p-2 mb-4 h-fit" data-aos="zoom-in" loading="lazy">
                    <img src="{{ asset('blog_header/blog_1.png') }}" class="rounded-lg mb-2 w-full" alt="blog">
                    <p class="text-gray-400 text-sm">NoData</p>
                    <h3 class="my-3">NoData</h3>
                    <a class="text-main font-semibold bg-main bg-opacity-10 py-2 px-4 rounded-md" href="#">NoData</a>
                </div>
            @endif
        </div>
    </div>

    <x-youtube_section />
    
    <div class="py-6 border-b border-1 border-gray-200 max-w-7xl m-auto">
        <h2 class="text-[30px] font-bold ml-3">Linux System Blogs</h2>
        <div class="grid grid-cols-3 py-4 gap-3 respon2:grid-cols-2 respon3:grid-cols-1">
            @if (count($linux) && $linux != null)
                @foreach ($linux as $item)
                    <div class="p-2 mb-4 h-fit" data-aos="zoom-in" loading="lazy">
                        <img src="{{ asset('storage/'.$item->small_thumb) }}" class="rounded-lg mb-2 w-full" alt="blog">
                        <p class="text-gray-400 text-sm">{{ $item->category->title }} - {{ $item->created_at->format('M d, Y') }}</p>
                        <h3 class="my-3">{{ $item->title }}</h3>
                        <a class="text-main font-semibold bg-main bg-opacity-10 py-2 px-4 rounded-md" href="{{ route('blog.slug', $item->slug) }}">Read article</a>
                    </div>
                @endforeach
            @else
                <div class="p-2 mb-4 h-fit" data-aos="zoom-in" loading="lazy">
                    <img src="{{ asset('blog_header/blog_1.png') }}" class="rounded-lg mb-2 w-full" alt="blog">
                    <p class="text-gray-400 text-sm">NoData</p>
                    <h3 class="my-3">NoData</h3>
                    <a class="text-main font-semibold bg-main bg-opacity-10 py-2 px-4 rounded-md" href="#">NoData</a>
                </div>
            @endif
        </div>
    </div>

    <div class="py-6 max-w-7xl m-auto">
        <h2 class="text-[30px] font-bold ml-3">Gaming Blogs</h2>
        <div class="grid grid-cols-3 py-4 gap-3 respon2:grid-cols-2 respon3:grid-cols-1">
            @if (count($gaming) && $gaming != null)
                @foreach ($gaming as $item)
                    <div class="p-2 mb-4 h-fit" data-aos="zoom-in" loading="lazy">
                        <img src="{{ asset('storage/'.$item->small_thumb) }}" class="rounded-lg mb-2 w-full" alt="blog">
                        <p class="text-gray-400 text-sm">{{ $item->category->title }} - {{ $item->created_at->format('M d, Y') }}</p>
                        <h3 class="my-3">{{ $item->title }}</h3>
                        <a class="text-main font-semibold bg-main bg-opacity-10 py-2 px-4 rounded-md" href="{{ route('blog.slug', $item->slug) }}">Read article</a>
                    </div>
                @endforeach
            @else
                <div class="p-2 mb-4 h-fit" data-aos="zoom-in" loading="lazy">
                    <img src="{{ asset('blog_header/blog_1.png') }}" class="rounded-lg mb-2 w-full" alt="blog">
                    <p class="text-gray-400 text-sm">NoData</p>
                    <h3 class="my-3">NoData</h3>
                    <a class="text-main font-semibold bg-main bg-opacity-10 py-2 px-4 rounded-md" href="#">NoData</a>
                </div>
            @endif
        </div>
    </div>
</div>