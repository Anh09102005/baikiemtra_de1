@extends('layouts.app')

@section('title', 'Danh sách thực phẩm')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Danh sách thực phẩm</h1>

    <!-- Form tìm kiếm -->
    <form action="{{ route('food.index') }}" method="GET" class="mb-4 flex gap-2">
        <input type="text" name="search" value="{{ request('search') }}" 
            placeholder="Nhập tên thực phẩm hoặc danh mục..." 
            class="border p-2 w-1/3 rounded-md">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tìm kiếm</button>
    </form>

    <a href="{{ route('food.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Thêm thực phẩm mới</a>

    <table class="w-full border-collapse border border-gray-300 mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">STT</th>
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Image</th>
                <th class="border border-gray-300 px-4 py-2">Tên</th>
                <th class="border border-gray-300 px-4 py-2">Giá</th>
                <th class="border border-gray-300 px-4 py-2">Danh mục</th>
                <th class="border border-gray-300 px-4 py-2">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($foods as $index => $food)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $food->id }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <img src="{{ asset('storage/' . $food->image) }}" alt="Hình ảnh" width="50" 
                        onerror="this.onerror=null;this.src='/images/default.png';">
                </td>
                <td class="border border-gray-300 px-4 py-2">{{ $food->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ number_format($food->price) }} VND</td>
                <td class="border border-gray-300 px-4 py-2">
                    {{ $food->category ? $food->category->name : 'Không có danh mục' }}
                </td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('food.edit', $food->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded">Sửa</a>
                    <form action="{{ route('food.destroy', $food->id) }}" method="POST" class="inline" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Xóa</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center border border-gray-300 px-4 py-2">Không tìm thấy thực phẩm nào.</td>
            </tr>
            <td class="border border-gray-300 px-4 py-2">
                <a href="{{ route('food.edit', $food->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded">Sửa</a>
                <form action="{{ route('food.destroy', $food->id) }}" method="POST" class="inline" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Xóa</button>
                </form>
            </td>
            
            @endforelse
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="mt-4">
        {{ $foods->links() }}
    </div>
@endsection
