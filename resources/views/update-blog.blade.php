<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.19.0/ckeditor.js" integrity="sha512-tjxUra6WjSA8H5+nC7G61SVqEXj1e958LdR4N8BGZeRx9tObm/YhsrUzY6tH4EuHQyZqOyu317pgV7f8YPFoAQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Update Blog - WebMentor</title>
</head>
<body>
    <div class="fixed top-0 right-0 w-[400px] h-screen bg-gray-900 overflow-y-auto z-[9999999] px-3">
        <form action="{{ route('blog.img.upload') }}" method="post" enctype="multipart/form-data" class="flex p-3 items-center">
            @csrf
            <input type="file" name="blog_imges" id="blog_imges" class="text-white">
            <button class="bg-main py-2 px-2 text-white font-bold rounded-md" type="submit">Upload</button>
        </form>
        <div class="flex flex-col">
            @if (count($images) && $images != null)
                @foreach ($images as $item)
                    <p class="bg-gray-800 text-gray-300 w-full rounded-md p-3 mb-2 break-words">/storage/{{ $item->image }}</p>
                @endforeach
            @endif
        </div>
    </div>
    <div class="fixed top-0 left-0 w-full h-full bg-white z-50 overflow-y-auto">
        <a class="p-2 px-3 m-3 mt-2 bg-gray-600 font-bold text-white rounded-full inline-block" href="{{ route('dashboard') }}"><i class="fas fa-arrow-left text-white"></i></a>
        <div class="flex items-center justify-center h-full">
            <div class="w-[800px] rounded-md h-fit bg-gray-200 p-6 py-[40px] shadow-sm">
                <h2 class="text-3xl font-bold ml-2">Update Blog!</h2>
                <form action="{{ route('blog.update.now', $update_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if (session('success'))
                        <p class="py-2 ml-3 text-green-600">{{ session('success') }}</p>
                    @endif
                    <input type="text" name="title" placeholder="Blog Title" autocomplete="off" value="{{ $blogdata->title }}"
                    class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    @error('title')
                        <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
                    @enderror

                    <input type="text" name="slug" placeholder="Blog Slug" autocomplete="off" value="{{ $blogdata->slug }}"
                    class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    @error('slug')
                        <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
                    @enderror

                    <label for="tags">Tags: (Please do not put spaces between tags or use single word)</label>
                    <input type="text" id="tags" name="tags" placeholder="Blog Tags (Saperate by ,)" autocomplete="off" value="{{ $blogdata->tags }}"
                    class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    @error('tags')
                        <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
                    @enderror

                    <input type="text" id="description" name="description" placeholder="Blog Description" autocomplete="off" value="{{ $blogdata->description }}"
                    class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    @error('description')
                        <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
                    @enderror

                    <select name="category" id="category"
                    class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-3 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    @if (count($categories) && $categories != null)
                        <option value="" selected>Select Category</option>
                        @foreach ($categories as $item)
                            
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    @else
                        <option value="" selected>Blog Categories Doesn't exist</option>
                    @endif
                    </select>
                    @error('category')
                        <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
                    @enderror

                    <select name="active" id="active"
                    class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-3 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        <option value="" selected>----Select Status----</option>
                        <option value="true">Active</option>
                        <option value="false">Disactive</option>
                    </select>
                    @error('active')
                        <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
                    @enderror

                    <label for="featured">Features: {{ $blogdata->featured }}</label>
                    <select name="featured" id="featured"
                    class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-3 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        <option value="" selected>Select Featured</option>
                        <option value="no">Not-Featured</option>
                        <option value="yes">Featured</option>
                    </select>
                    @error('featured')
                        <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
                    @enderror

                    <label class="text-gray-700" for="small_thumb">Small Thumbnail (50KB Max)</label>
                    <input type="file" id="small_thumb" name="small_thumb" autocomplete="off" accept="image/*"
                    class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    @error('small_thumb')
                        <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
                    @enderror
                    
                    <label class="text-gray-700" for="large_thumb">Large Thumbnail (300KB Max)</label>
                    <input type="file" id="large_thumb" name="large_thumb" autocomplete="off" accept="image/*"
                    class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    @error('large_thumb')
                        <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
                    @enderror
                    <textarea name="summary_ckeditor" rows="8" class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $blogdata->message }}</textarea>
                    @error('summary_ckeditor')
                        <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
                    @enderror
                    <button class="p-2 mt-3 px-5 bg-main font-bold text-white rounded-md" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>