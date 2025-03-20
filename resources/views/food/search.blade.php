@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Kết quả tìm kiếm cho: <b>{{ $query }}</b></h2>

    @if($foods->count() > 0)
        <div class="grid">
            @foreach($foods as $food)
                <div class="food-card">
                    <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}">
                    <div class="food-name">{{ $food->name }}</div>
                    <div class="food-price">{{ number_format($food->price) }}đ</div>
                    <a href="{{ route('food.show', $food->id) }}" class="btn-buy">Mua ngay</a>
                </div>
            @endforeach
        </div>
    @else
        <p>Không tìm thấy sản phẩm nào!</p>
    @endif
</div>
<form action="{{ route('food.search') }}" method="GET" style="display: flex; gap: 5px;">
    <input type="text" name="query" placeholder="Tìm kiếm sản phẩm..." value="{{ request('query') }}"
           style="padding: 8px; width: 250px; border-radius: 5px; border: 1px solid #ccc;">
    <button type="submit" style="padding: 8px 15px; background: green; color: rgb(16, 11, 11); border: none; border-radius: 5px;">
        Tìm kiếm
    </button>
</form>

@endsection
