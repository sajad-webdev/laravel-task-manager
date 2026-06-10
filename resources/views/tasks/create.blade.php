@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-800">ایجاد تسک جدید</h2>
        <a href="{{ route('tasks.index') }}" class="text-sm text-blue-600 hover:underline">بازگشت</a>
    </div>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                عنوان تسک
            </label>
            <input name="title" id="title" type="text" 
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror" 
                   placeholder="مثلاً: خرید نان" value="{{ old('title') }}">
            
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                توضیحات (اختیاری)
            </label>
            <textarea name="description" id="description" rows="3"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
        </div>


        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            ذخیره تسک
        </button>
    </form>
</div>
@endsection
