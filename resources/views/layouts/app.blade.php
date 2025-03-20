<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body>

    <!-- Thanh điều hướng -->
    <nav class="bg-green-900 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-white text-2xl font-bold">AT10</a>
            <ul class="flex space-x-6">
                <li><a href="#" class="hover:text-yellow-400">THỰC ĐƠN</a></li>
                <li><a href="{{ route('home') }}" class="hover:text-yellow-400">TRANG CHỦ</a></li>
                <li><a href="#" class="hover:text-yellow-400">GIỚI THIỆU</a></li>
                <li><a href="{{ route('food.index') }}" class="hover:text-yellow-400">SẢN PHẨM</a></li>
                <li><a href="#" class="hover:text-yellow-400">LIÊN HỆ</a></li>
                <li><a href="#" class="hover:text-yellow-400">HƯỚNG DẪN</a></li>
            </ul>
            <form class="relative">
                <input type="text" class="border p-2 rounded" placeholder="Tìm kiếm...">
                <button class="absolute right-2 top-2 text-gray-600">
                    🔍
                </button>
            </form>
        </div>
    </nav>

    <!-- Nội dung chính -->
    <div class="container mx-auto mt-4">
        @yield('content')
    </div>

</body>
</html>
