@extends('layouts.apps')
@section('content')
    <div class="max-w-4xl py-6 px-4 m-auto">
        <h1 class="text-3xl mb-3">Update Course</h1>
        <form action="{{ route('course.update', $id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (session('success'))
                <p class="py-2 ml-3 text-green-600">{{ session('success') }}</p>
            @endif
            <input type="text" name="title" value="{{ $course->title }}" placeholder="Course Title" autocomplete="off" required
            class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('title')
                <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
            @enderror

            <input type="text" name="slug" placeholder="Course Slug" autocomplete="off"
            class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('slug')
                <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
            @enderror

            <input type="text" name="detail" placeholder="Course Detail" autocomplete="off"
            class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('detail')
                <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
            @enderror

            <input type="number" name="lectures" placeholder="Lectures (Number)" autocomplete="off"
            class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('lectures')
                <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
            @enderror

            <input type="number" name="duration" placeholder="Duration (Number)" autocomplete="off"
            class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('duration')
                <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
            @enderror

            <input type="number" name="price" placeholder="Price" autocomplete="off"
            class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('price')
                <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
            @enderror

            <input type="file" name="thumb" autocomplete="off" accept="image/*"
            class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('thumb')
                <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
            @enderror
    
            <textarea name="description" id="description" cols="30" rows="4" required
            class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"placeholder="Description">{{ $course->description }}</textarea>
            @error('description')
                <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
            @enderror

            <textarea name="body" id="body" cols="30" rows="4" required
            class="w-full bg-white rounded border mb-3 border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="Body">{{ $course->body }}</textarea>
            @error('body')
                <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
            @enderror
            <button class="p-2 mt-3 px-5 bg-main font-bold text-white rounded-md" type="submit">Update</button>
        </form>
        <script>
            CKEDITOR.replace('body');
        </script>
    </div>
@endsection