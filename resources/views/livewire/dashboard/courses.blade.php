<div class="p-3 min-h-[50vh]">
    <style>
        [x-cloak]{
            display: none;
        }
    </style>
    <div class="w-full h-fit py-6 rounded-md max-w-7xl m-auto">
        <div class="flex justify-between items-center"><h2 class="text-dark text-3xl mb-4">Courses Database</h2><a href="{{ route('courses.create') }}" class="py-2 px-4 text-white bg-main rounded-md">Post Course</a></div>
        <table class="w-full text-center overflow-hidden rounded-md border border-gray-200">
            <tr class="bg-gray-900 text-white text-sm">
                <th class="text-start px-3 py-4">Title</th>
                <th>Slug</th>
                <th>Lectures</th>
                <th>Duration</th>
                <th>Price</th>
                <th class="text-end px-3">View</th>
                <th class="text-end px-3">Edit</th>
            </tr>
            @if(count($courses) && $courses != null)
                @foreach ($courses as $key => $item)
                    <tr class="border-t border-gray-100 text-sm py-2">
                        <td class="py-2 text-start px-3">{{ $item->title }}</td>
                        <td>{{ $item->slug }}</td>
                        <td class="px-3">{{ $item->lectures }} Lectures</td>
                        <td>{{ $item->duration }} Month</td>
                        <td>{{ number_format($item->price, 2) }}</td>
                        <td class="text-end px-3"><a href="{{ route('course.page', $item->slug) }}" target="_blank" class="text-main underline">Visit</a></td>
                        <td class="text-end px-3"><a href="{{ route('course.update', $item->id) }}" class="text-main underline">Edit</a></td>
                    </tr>
                @endforeach
            @else
                <tr class="border-t border-gray-100 text-sm py-2">
                    <td class="text-start px-3 py-3">Empty</td>
                    <td>Empty</td>
                    <td>Empty</td>
                    <td>Empty</td>
                    <td>Empty</td>
                    <td class="text-end px-3">Empty</td>
                    <td class="text-end px-3">Empty</td>
                </tr>
            @endif
        </table>
    </div>
</div>