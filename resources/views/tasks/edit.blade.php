@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-800">ویرایش تسک</h2>
        <a href="{{ route('tasks.index') }}" class="text-sm text-blue-600 hover:underline">انصراف</a>
    </div>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                عنوان تسک
            </label>
            <input name="title" id="title" type="text" 
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror" 
                   value="{{ old('title', $task->title) }}">
            
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                توضیحات
            </label>
            <textarea name="description" id="description" rows="3"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="mb-6 flex items-center">
            <input type="checkbox" name="status" id="status" value="completed" {{ $task->status === 'completed' ? 'checked' : '' }} class="ml-2 w-4 h-4">
            <label for="status" class="text-gray-700 text-sm">علامت‌گذاری به عنوان انجام شده</label>
        </div>

        <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            بروزرسانی تسک
        </button>
    </form>
</div>
@endsection
