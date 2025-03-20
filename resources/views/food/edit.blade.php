@extends('layouts.app')

@section('title', 'Chỉnh sửa thực phẩm')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Chỉnh sửa thực phẩm</h1>

    <form action="{{ route('food.update', $food->id) }}" method="POST" enctype="multipart/form-data" class="max-w-lg">
        @csrf
        @method('PUT')

        <!-- Tên thực phẩm -->
        <label class="block mb-2">Tên thực phẩm:</label>
        <input type="text" name="name" value="{{ old('name', $food->name) }}"
            class="border p-2 w-full rounded-md">
        @error('name') <p class="text-red-500">{{ $message }}</p> @enderror

        <!-- Giá -->
        <label class="block mt-4 mb-2">Giá:</label>
        <input type="number" name="price" value="{{ old('price', $food->price) }}"
            class="border p-2 w-full rounded-md">
        @error('price') <p class="text-red-500">{{ $message }}</p> @enderror

        <!-- Danh mục -->
        <label class="block mt-4 mb-2">Danh mục:</label>
        <select name="category_id" class="border p-2 w-full rounded-md">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $food->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id') <p class="text-red-500">{{ $message }}</p> @enderror

        <!-- Ảnh -->
        <label class="block mt-4 mb-2">Ảnh sản phẩm:</label>
        <input type="file" name="image" class="border p-2 w-full rounded-md">
        <img src="{{ asset('storage/' . $food->image) }}" alt="Hình ảnh" width="100"
            class="mt-2">
        @error('image') <p class="text-red-500">{{ $message }}</p> @enderror

        <!-- Mô tả -->
        <label class="block mt-4 mb-2">Mô tả:</label>
        <textarea name="description" class="border p-2 w-full rounded-md">{{ old('description', $food->description) }}</textarea>
        @error('description') <p class="text-red-500">{{ $message }}</p> @enderror

        <!-- Nút cập nhật -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Cập nhật</button>
        <a href="{{ route('food.index') }}" class="text-gray-500 ml-4">Hủy</a>
    </form>
@endsection
