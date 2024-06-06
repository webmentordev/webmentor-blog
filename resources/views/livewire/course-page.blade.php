<div class="max-w-4xl m-auto p-4 py-[50px] course-page">
    <img src="{{ asset('storage/'.$course[0]->thumb) }}" class="max-w-[500px] w-full m-auto mb-6">
    <h1 class="text-3xl mb-3">{{ $course[0]->title }}</h1>
    <ul class="flex mb-3 respon3-2:grid grid-cols-2 respon4:grid-cols-1">
        <li class="mr-6 respon3-2:mb-2"><i class="fas fa-clock text-main"></i> - {{ $course[0]->duration }} {{ Str::plural('Month', $course[0]->duration) }} Duration</li>
        <li class="mr-6 respon3-2:mb-2"><i class="fas fa-graduation-cap text-main"></i> - {{ $course[0]->lectures }} {{ Str::plural('Lecture', $course[0]->lectures) }} Per Week</li>
        <li><span class="text-main font-bold">PKR</span> -  {{ number_format($course[0]->price, 0) }}</li>
    </ul>
    <p>{{ $course[0]->description }}</p>
    <h2 class="text-2xl mb-3 text-main">Course Outline:</h2>
    <div class="details">
        {!! $course[0]->body !!}
    </div>
</div>