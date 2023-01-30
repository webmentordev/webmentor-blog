@section('title', "{$title}")
<div class="bg-white">
    <header class="h-[50vh] bg-dark py-8 px-2">
        <div class="max-w-3xl m-auto mb-2">
            <p class="text-gray-300 text-center mb-3 text-md">{{ $blog[0]->category->title }} - {{ $blog[0]->created_at->format('M d, Y') }} Written by {{ $blog[0]->user->name }}</p>
            @if ($blog[0]->created_at != $blog[0]->updated_at)
                <p class="text-gray-300 text-center mb-[20px] text-md">Last updated - {{ $blog[0]->updated_at->format('M d, Y') }} - {{ $blog[0]->updated_at->diffForHumans() }}</p>
            @endif
            <h1 class="text-white text-center text-4xl leading-[60px]">{{ $blog[0]->title }}</h1>
        </div>
        <img src="{{ asset('storage/'.$blog[0]->large_thumb) }}" class="rounded-lg max-w-2xl m-auto shadow-lg w-full" alt="blog_featured_image">
    </header>
    <main class="blog max-w-5xl m-auto pt-[200px] px-4">
        <nav class="links py-2 flex flex-wrap capitalize tags">
            @php
                $links =  explode(',', $blog[0]->tags);
                for ($i=0; $i < count($links); $i++) { 
                    echo '<a href="'.route('blog.tag', str_replace(' ', '-', $links[$i])).'" class="bg-main mr-2 rounded-md text-white" style="color: #fff">'.$links[$i].'</a>';
                }
            @endphp
        </nav>
        {!! $blog[0]->message !!}
    </main>
    <x-youtube_section />
    <div class="py-6 max-w-7xl m-auto mt-6">
        <h2 class="text-[30px] font-bold ml-3">Related Blogs</h2>
        <div class="grid grid-cols-3 py-2 gap-3 respon2:grid-cols-2 respon3:grid-cols-1">
            @if (count($related) && $related != null)
                @foreach ($related as $item)
                    <div class="p-2 mb-4 h-fit" data-aos="zoom-in" loading="lazy">
                        <img src="{{ asset('storage/'.$item->small_thumb) }}" class="rounded-lg mb-2 w-full" alt="blog">
                        <p class="text-gray-400 text-sm">{{ $item->category->title }} - {{ $item->created_at->format('M d, Y') }}</p>
                        <h3 class="my-3">{{ $item->title }}</h3>
                        <a class="text-main font-semibold bg-main bg-opacity-10 py-2 px-4 rounded-md" href="{{ route('blog.slug', $item->slug) }}">Read article</a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>