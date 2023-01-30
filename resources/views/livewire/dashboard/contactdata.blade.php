@section('title', 'Contacts - WebMentor')
<div class="p-3 min-h-[50vh]">
    <style>
        [x-cloak]{
            display: none;
        }
    </style>
    <div class="w-full h-fit py-6 rounded-md max-w-7xl m-auto">
        <h2 class="text-dark text-3xl mb-4">Welcome to Contacts Database</h2>
        <table class="w-full text-center overflow-hidden rounded-md border border-gray-200">
            <tr class="bg-gray-900 text-white text-sm">
                <th class="text-start px-3 py-4">Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Posted</th>
                <th class="text-end px-3">LastUpdated</th>
            </tr>
            @if(count($contacts) && $contacts != null)
                @foreach ($contacts as $key => $item)
                    <tr class="border-t border-gray-100 text-sm py-2">
                        <td class="py-2 text-start px-3">{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td class="text-start px-3">{{ $item->message }}</td>
                        <td>{{ $item->created_at->format('M d, Y') }}</td>
                        <td class="text-end px-3">{{ $item->updated_at->format('M d, Y') }}</td>
                    </tr>
                @endforeach
            @else
                <tr class="border-t border-gray-100 text-sm py-2">
                    <td class="py-2 text-start px-3">No blog Data exist</td>
                    <td>No blog Data exist</td>
                    <td class="text-start px-3">No blog Data exist</td>
                    <td>No blog Data exist</td>
                    <td>No blog Data exist</td>
                    <td class="text-end px-3">No blog Data exist</td>
                </tr>
            @endif
        </table>
    </div>
</div>