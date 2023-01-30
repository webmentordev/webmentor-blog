@section('title', 'Categories Database - WebMentor')
<div class="p-3 min-h-[50vh]">
    <div class="w-full h-fit rounded-md max-w-7xl py-6 m-auto">
        <h2 class="text-dark text-3xl mb-4">Welcome to Categories Database</h2>
        @if (session('success'))
            <p class="text-green-600 ml-3 py-2">{{ session('success') }}</p>
        @endif
        <form wire:submit.prevent='create' method="post" class="flex mb-3 items-center">
            <input type="text" name="title" wire:model="title" placeholder="Category Title" autocomplete="off"
            class="w-full bg-white mr-3 rounded border border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            <button class="p-2 px-5 bg-main font-bold text-white rounded-md" type="submit">Create</button>
        </form>
        @error('title')
            <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
        @enderror
        <table class="w-full text-center overflow-hidden rounded-md border border-gray-200">
            <tr class="bg-gray-900 text-white text-sm">
                <th class="py-3">Sr#</th>
                <th class="text-start px-3">Title</th>
                <th>CreatedBy</th>
                <th>Slug</th>
                <th>Posted</th>
                <th>LastUpdated</th>
                <th class="text-end px-3">Edit</th>
            </tr>
            @if(count($categories) && $categories != null)
                @foreach ($categories as $key => $item)
                    <tr class="border-b border-gray-200 text-sm py-2">
                        <td class="py-2">{{ $key + 1 }}</td>
                        <td class="py-2 text-start px-3">{{ $item->title }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>{{ $item->created_at->format('M d, Y') }}</td>
                        <td>{{ $item->updated_at->format('M d, Y') }}</td>
                        <td class="text-end px-3">{{ $item->updated_at->format('M d, Y') }}</td>
                    </tr>
                @endforeach
            @else
                <tr class="border-t border-gray-100 text-sm py-2">
                    <td class="py-2">No blog Data exist</td>
                    <td class="py-2 text-start px-3">No blog Data exist</td>
                    <td>No blog Data exist</td>
                    <td>No blog Data exist</td>
                    <td>No blog Data exist</td>
                    <td>No blog Data exist</td>
                    <td class="text-end px-3">No blog Data exist</td>
                </tr>
            @endif
        </table>
    </div>
</div>