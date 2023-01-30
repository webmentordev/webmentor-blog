<section class="w-full">
    <div class="max-w-5xl m-auto p-4 py-[80px]">
        <div class="text-center">
            <h2 class="text-4xl">Discover your favorite courses</h2>
            <p class="text-gray-400 mb-3">We have plenty of courses to teach. Select your favourite course <br> and learn industry level development</p>
            <h2 class="text-3xl text-main">One-To-One Only</h2>
        </div>
        @if (count($courses) && $courses != null)
        <div class="grid grid-cols-3 py-[50px] gap-3">
            @foreach ($courses as $item)
                <div class="p-4 bg-gray-100 rounded-lg h-fit">
                    <img src="{{ asset('storage/'. $item->thumb) }}" class="rounded-lg overflow-hidden mb-3" alt="{{ $item->title }} Image">
                    <div class="p-3 flex flex-col">
                        <h2 class="text-lg">{{ $item->title }}</h2>
                        <p class="text-sm">{{ $item->detail }}</p>
                        <strong class="mt-3 mb-3"><span>PKR {{ number_format($item->price, 0) }}</span></strong>
                        <ul class="flex justify-between text-sm mb-3">
                            <li><i class="fas fa-clock"></i> 2 {{ Str::plural('Month', $item->duration ) }}</li>
                            <li><i class="fas fa-graduation-cap"></i> 3 {{ Str::plural('Lecture', $item->lectures ) }}/Week</li>
                        </ul>
                        <a href="{{ route('course.page', $item->slug) }}" class="py-2 w-full font-bold rounded-lg bg-main text-center text-white">Read More <i class="ml-2 fas fa-caret-right"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
        @else
            <p>No Courses data exist for now</p>
        @endif
        @if($courses->hasPages())
            <div class="py-3">
                {{ $courses->links() }}
            </div>
        @endif
    </div>
</section>