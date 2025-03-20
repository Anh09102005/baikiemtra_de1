<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function category($id)
    {
        $foodCate = Food::where('category_id', $id)
        ->get();
        return view('home', compact('foodCate'));
    }
    // Hiển thị danh sách món ăn
    public function index()
    {
        $foods = Food::with('category')->latest()->paginate(10);
        return view('food.index', compact('foods'));
    }

    // Hiển thị form thêm món ăn
    public function create()
    {
        $categories = Category::all();
        return view('food.create', compact('categories'));
    }

    // Xử lý thêm món ăn mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1000',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Xử lý upload ảnh
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Lưu ảnh vào storage/app/public/images
        }

        // Lưu vào database
        Food::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('food.index')->with('success', 'Thêm món ăn thành công!');
    }

    // Hiển thị chi tiết món ăn
    public function show(Food $food)
    {
        return view('food.show', compact('food'));
    }

    // Hiển thị form chỉnh sửa món ăn
    public function edit(Food $food)
    {
        $categories = Category::all();
        return view('food.edit', compact('food', 'categories'));
    }

    // Cập nhật món ăn
    public function update(Request $request, Food $food)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Xử lý upload ảnh mới
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($food->image) {
                Storage::disk('public')->delete($food->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $food->image; // Giữ ảnh cũ
        }

        // Cập nhật database
        $food->update([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('food.index')->with('success', 'Cập nhật món ăn thành công!');
    }

    // Xóa món ăn
    public function destroy(Food $food)
    {
        // Xóa ảnh nếu có
        if ($food->image) {
            Storage::disk('public')->delete($food->image);
        }

        $food->delete();
        return redirect()->route('food.index')->with('success', 'Xóa món ăn thành công!');
    }


public function search(Request $request)
{
    $query = $request->input('query');

    $foods = Food::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->get();

    return view('foods.search', compact('foods', 'query'));
}

}
