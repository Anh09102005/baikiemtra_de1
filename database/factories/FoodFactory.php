<?
namespace Database\Factories;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodFactory extends Factory
{
    public function definition()
    {
        $array = ['bingo.jpg', 'cachua.jpg', 'thom.jpg']; // Sửa lỗi ảnh
        $arrayName = ['Nho xanh', 'Bí ngô', 'Bơ xanh', 'Cà chua', 'Cam Cao Phong', 'Củ dền'];

        return [
            'name' => $this->faker->randomElement($arrayName),
            'category_id' => Category::exists() 
                ? Category::inRandomOrder()->first()->id 
                : Category::factory()->create()->id, // Kiểm tra danh mục trước
            'price' => $this->faker->numberBetween(1000, 20000),
            'image' => $this->faker->randomElement($array),
            'description' => $this->faker->text(90),
        ];
    }
}
