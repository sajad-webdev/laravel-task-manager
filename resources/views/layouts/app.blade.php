<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت تسک‌ها</title>
    <!-- اضافه کردن Tailwind از طریق CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Vazirmatn', sans-serif; }
    </style>
</head>
<body class="bg-gray-100">
    <!-- نوار ناوبری اصلاح شده -->
    <nav class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4"> <!-- عرض را با بدنه یکی کردیم و پدینگ اضافی رو برداشتیم -->
            <div class="flex justify-between h-16">
                <!-- سمت راست: لوگو و لیست تسک‌ها -->
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-2">
                        <div class="bg-blue-600 p-1.5 rounded-lg shadow-sm">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                        </div>
                        <span class="text-lg font-bold text-blue-900 tracking-tight">Task Manager</span>
                    </div>
                    <div class="hidden sm:flex items-center">
                        <a href="{{ route('tasks.index') }}" class="text-gray-600 hover:text-blue-600 px-1 pt-1 border-b-2 border-transparent hover:border-blue-500 text-sm font-medium transition-all">
                            لیست تسک‌ها
                        </a>
                    </div>
                </div>

                <!-- سمت چپ: آیکون‌ها -->
                <div class="flex items-center gap-3">
                    <button class="text-gray-400 hover:text-gray-600 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </button>
                    <div class="h-9 w-9 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 border border-gray-200 cursor-pointer hover:bg-gray-200 transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="container mx-auto px-4">
        @yield('content')
    </main>

    <footer class="mt-12 text-center text-gray-500 pb-6">
        ساخته شده با ❤️ در دوره آموزش لاراول
    </footer>

    <!-- کد جاوا اسکریپت برای حذف خودکار پیام ها -->
    <script>
        // صبر می‌کنیم تا کل صفحه لود شود
        document.addEventListener('DOMContentLoaded', function() {
            const alert = document.getElementById('success-alert');
            if (alert) {
                // بعد از 3000 میلی‌ثانیه (3 ثانیه) عملیات شروع شود
                setTimeout(() => {
                    alert.style.opacity = '0'; // محو شدن بصری
                    setTimeout(() => {
                        alert.remove(); // حذف کامل از صفحه
                    }, 500); // نیم ثانیه صبر برای اتمام انیمیشن
                }, 3000);
            }
        });
    </script>

</body>
</html>
