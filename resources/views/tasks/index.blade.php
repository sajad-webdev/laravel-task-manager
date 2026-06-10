@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto pt-10 px-4"> <!-- اضافه کردن پدینگ بالا و کناره -->
    <div class="flex justify-between items-center mb-8"> <!-- فاصله بیشتر با جدول -->
        <h2 class="text-2xl font-extrabold text-gray-800">تسک‌های من</h2>
        <a href="{{ route('tasks.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-5 py-2.5 rounded-xl shadow-sm hover:shadow-md transition-all flex items-center gap-2 font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            تسک جدید
        </a>
    </div>

    <!-- باکس نمایش پیام حذف شونده -->
    @if(session('success'))
        <div id="success-alert" class="max-w-4xl mx-auto mb-6 transition-opacity duration-500">
            <div class="bg-green-50 border-r-4 border-green-500 text-green-700 p-4 rounded-xl shadow-sm flex justify-between items-center">
                <div class="flex items-center">
                    <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-medium text-sm">{{ session('success') }}</span>
                </div>
                <!-- دکمه بستن دستی -->
                <button onclick="document.getElementById('success-alert').remove()" class="text-green-500 hover:text-green-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>
    @endif

    <div class="bg-white shadow-sm rounded-2xl overflow-hidden border border-gray-100">
        @if($tasks->count() > 0)
        <table class="w-full text-right text-gray-600">
            <thead class="bg-gray-50 text-gray-700 uppercase">
                <tr>
                    <th class="px-6 py-3">عنوان</th>
                    <th class="px-6 py-3">وضعیت</th>
                    <th class="px-6 py-3">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4 {{ $task->status === 'completed' ? 'line-through text-gray-400' : '' }}">
                        {{ $task->title }}
                    </td>
                    <td class="px-6 py-4">
                        @if($task->status === 'pending')
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">در جریان</span>
                        @elseif($task->status === 'completed')
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">انجام شده</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-start gap-4">
                            <!-- دکمه سوییچ وضعیت -->
                            <form action="{{ route('tasks.toggle', $task) }}" method="POST" class="flex items-center">
                                @csrf @method('PATCH')
                                <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-full transition-all duration-200">
                                    @if($task->status === 'completed')
                                        <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center shadow-sm">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                        </div>
                                    @else
                                        <div class="w-6 h-6 border-2 border-gray-300 rounded-full hover:border-green-500 transition-colors"></div>
                                    @endif
                                </button>
                            </form>
                            <!-- دکمه ویرایش -->
                            <a href="{{ route('tasks.edit', $task) }}" class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-orange-500 transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <!-- دکمه حذف -->
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('آیا مطمئن هستید؟')" class="flex items-center">
                                @csrf @method('DELETE')
                                <button type="submit" class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-red-500 transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <!-- وضعیت خالی (Empty State) -->
        <div class="flex flex-col items-center justify-center py-16 px-4">
            <div class="bg-blue-50 p-6 rounded-full mb-4">
                <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">هنوز هیچ تسکی نداری!</h3>
            <p class="text-gray-500 text-center max-w-sm mb-8">
                روز خودت رو با نوشتن اولین هدف یا کار مهم شروع کن. یادت باشه کارهای بزرگ با قدم‌های کوچک شروع میشن.
            </p>
            <a href="{{ route('tasks.create') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-bold transition-all shadow-lg shadow-blue-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                نوشتن اولین تسک
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
