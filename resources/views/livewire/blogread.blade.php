@section('title', "{$title}")
<div class="bg-white">
    <div class="py-8">
        <div class="max-w-4xl m-auto mb-2 px-4">
            <p class="text-gray-800 text-center mb-3 text-md">{{ $blog[0]->category->title }} - <time class="created" datetime="{{ $blog[0]->created_at->tz('UTC')->toAtomString() }}" itemprop="dateCreated">{{ $blog[0]->created_at->format('M d, Y') }}</time> Written by <strong>{{ $blog[0]->user->name }}</strong></p>
            <h1 class="text-gray-800 text-center text-4xl leading-[60px]">{{ $blog[0]->title }}</h1>
            <img src="{{ asset('storage/'.$blog[0]->large_thumb) }}" class="rounded-lg m-auto shadow-lg w-full mb-2" alt="blog_featured_image">
            @if ($blog[0]->created_at != $blog[0]->updated_at)
                <p class="text-gray-700 mb-[20px] text-md">Last updated - <time class="updated" datetime="{{ $blog[0]->updated_at->tz('UTC')->toAtomString() }}" itemprop="dateModified">{{ $blog[0]->updated_at->format('M d, Y') }}</time> - {{ $blog[0]->updated_at->diffForHumans() }}</p>
            @endif
        </div>
        
    </div>
    
    <main class="blog max-w-4xl m-auto py-5 px-4">
        <nav class="links py-2 flex flex-wrap capitalize tags mb-6">
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