@section('title', 'Blogs Database - WebMentor')
<div class="p-3 min-h-[50vh]">
    <style>
        [x-cloak]{
            display: none;
        }
    </style>
    <div class="w-full h-fit py-6 rounded-md max-w-7xl m-auto">
        <div class="flex justify-between items-center"><h2 class="text-dark text-3xl mb-4">Welcome to Blogs Database</h2><a href="{{ route('blog.create') }}" class="py-2 px-4 text-white bg-main rounded-md">Post Blog</a></div>
        <table class="w-full text-center overflow-hidden rounded-md border border-gray-200">
            <tr class="bg-gray-900 text-white text-sm">
                <th class="text-start px-3 py-4">Title</th>
                <th>Slug</th>
                <th class="text-start px-3">Tags</th>
                <th>Posted</th>
                
                <th class="text-start px-3">LastUpdated</th>
                <th class="text-end">Featured</th>
                <th class="text-end">Active</th>
                <th class="text-end">Visit</th>
                <th class="text-end px-3">Edit</th>
                
            </tr>
            @if(count($blogs) && $blogs != null)
                @foreach ($blogs as $key => $item)
                    <tr class="border-t border-gray-100 text-sm py-2">
                        <td class="py-2 text-start px-3">{{ $item->title }}</td>
                        <td>{{ $item->slug }}</td>
                        <td class="text-start px-3">{{ $item->tags }}</td>
                        <td>{{ $item->created_at->format('M d, Y') }}</td>
                        <td class="text-start px-3">{{ $item->updated_at->format('M d, Y') }}</td>
                        <td class="text-end px-3">@if ($item->featured == 'no') <span class="text-red-600"><i class="fas fa-times"></i></span> @elseif($item->featured == 'yes') <span class="text-green-600"><i class="fas fa-check"></i></span> @endif</td>
                        <td class="text-end px-3">@if ($item->is_active == false) <span class="text-red-600"><i class="fas fa-times"></i></span> @elseif($item->is_active == true) <span class="text-green-600"><i class="fas fa-check"></i></span> @endif</td>
                        <td class="text-end px-3"><a href="{{ route('admin.slug', $item->slug) }}" target="_blank" class="text-main underline">Visit</a></td>
                        <td class="text-end px-3"><a href="{{ route('blog.update', $item->id) }}" class="text-main underline">Edit</a></td>
                    </tr>
                @endforeach
            @else
                <tr class="border-t border-gray-100 text-sm py-2">
                    <td class="py-2">No blog Data exist</td>
                    <td class="py-2 text-start px-3">No blog Data exist</td>
                    <td>No blog Data exist</td>
                    <td class="text-start px-3">No blog Data exist</td>
                    <td>No blog Data exist</td>
                    <td class="text-end px-3">No blog Data exist</td>
                    <td class="text-end px-3">No blog Data exist</td>
                </tr>
            @endif
        </table>
    </div>
</div>