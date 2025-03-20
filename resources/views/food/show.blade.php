@extends('layouts.app')

@section('content')
<style>
    .container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    .card {
        display: flex;
        flex-direction: column;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        width: 100%;
        background-color: white;
    }
    .back-button {
        text-decoration: none;
        background: #f0f0f0;
        padding: 8px 12px;
        border-radius: 6px;
        display: inline-block;
        margin-bottom: 15px;
        color: black;
    }
    .row {
        display: flex;
        align-items: center;
        gap: 20px;
    }
    .image-box {
        flex: 1;
        text-align: center;
    }
    .image-box img {
        max-width: 100%;
        max-height: 220px;
        border-radius: 8px;
    }
    .info {
        flex: 1.5;
    }
    .title {
        font-size: 22px;
        font-weight: bold;
        text-transform: uppercase;
    }
    .price {
        font-size: 18px;
        font-weight: bold;
        color: green;
    }
    .old-price {
        text-decoration: line-through;
        color: gray;
        margin-left: 10px;
    }
    .section-title {
        font-weight: bold;
        margin-top: 10px;
    }
    .buy-button {
        background: green;
        color: white;
        padding: 10px;
        border: none;
        width: 100%;
        border-radius: 6px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
    }
    .buy-button:hover {
        background: darkgreen;
    }
</style>

<div class="container">
    <div class="card">
        <!-- Nút Quay Lại -->
        <a href="{{ route('food.index') }}" class="back-button">← Quay Lại</a>

        <div class="row">
            <!-- Hình ảnh món ăn -->
            <div class="image-box">
                <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}">
            </div>

            <!-- Thông tin món ăn -->
            <div class="info">
                <div class="title">{{ $food->name }}</div>
                
                <div class="price">
                    {{ number_format($food->price) }}đ
                    <span class="old-price">15,000đ</span>
                </div>

                <div class="section-title">Mô Tả:</div>
                <p>{{ $food->description ?? 'Chưa có mô tả' }}</p>

                <div class="section-title">Phân Loại:</div>
                <p>{{ $food->category->name ?? 'Không xác định' }}</p>

                <!-- Nút Mua Ngay -->
                <button class="buy-button">Mua Ngay</button>
            </div>
        </div>
    </div>
</div>
@endsection
