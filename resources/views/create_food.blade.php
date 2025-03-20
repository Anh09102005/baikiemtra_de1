
@extends('master')
@section('content')
<form method="POST" action="{{ route('food.store') }}" enctype="multipart/form-data" class="pt-5">
    @if(Session::get('message'))
    <p class="text-danger text-center">{{Session::get('message') }}</p>
    @endif
        @csrf

        <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Giá:</label>
            <input type="text" id="price" name="price" value="{{ old('price') }}" required>
            @error('price')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Ảnh:</label>
            <input type="file" id="image" name="image" value="{{ old('image') }}" required>
            @error('image')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Phân loại:</label>
            <select id="category" name="category" required>
                <option value="" {{ old('category') == '' ? 'selected' : '' }}>-- Chọn phân loại --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection