<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';
    protected $fillable = ['name', 'price', 'description', 'category_id', 'image'];

    // Định nghĩa quan hệ với Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
}
