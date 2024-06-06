@section('title', 'Contact Us - WebMentor')
<div class="h-[80vh] flex items-center justify-center">
    <form wire:submit='send' method="POST" class="w-[512px] bg-gray-200 p-6 rounded-md py-[40px] shadow-sm">
        <h2 class="text-3xl font-bold" style="margin: 0px 0px 5px 0px">Contact Us!</h2>
        <p class="mb-3">Feel free to contact us. If you have any advice, suggestion & if you fing any error in blog, simply write in message. Positive Comments are always welcome.</p>
        @if (session('success'))
            <p class="text-green-600 text-center py-3">{{ session('success') }}</p>
        @endif
        <input type="text" name="name" placeholder="Full Name"
        class="w-full bg-white rounded-md border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        @error('name')
            <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
        @enderror
        
        <input type="email" name="email" placeholder="Email Address"
        class="w-full bg-white rounded-md border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        @error('email')
            <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
        @enderror

        <input type="text" name="subject" placeholder="Subject"
        class="w-full bg-white rounded-md border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        @error('subject')
            <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
        @enderror

        <textarea name="message" id="message" cols="30" rows="4"
        placeholder="Write message here!"
        class="w-full bg-white rounded-md border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
        @error('message')
            <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
        @enderror
        <button class="bg-main text-white py-2 px-5 block mt-2 rounded-lg mb-3">Send Message</button>
    </form>
</div>