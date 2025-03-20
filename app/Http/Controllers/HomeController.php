<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
class HomeController extends Controller
{
    public function index()
    {
        $foodCate = Food::all();
        return view('home', compact('foodCate'));
    }
}
