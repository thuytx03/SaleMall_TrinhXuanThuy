<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'Sản phẩm 1', 'image' => 'public/products/Lg4noFRMtIGZjfYf8EUjlggwBmqu7MnoNzsvwJC0.jpg', 'price' => '1000000', 'description' => 'Hàng VN chất lượng cao'],
            ['name' => 'Sản phẩm 2', 'image' => 'public/products/qaEQhT0UhSMtwUHLer5w4yhtNXz3anypuFz3yK8I.jpg', 'price' => '8000000','description' => 'Hàng VN chất lượng cao'  ],
            ['name' => 'Sản phẩm 3', 'image' => 'public/products/3wu9PeaoVvx0WfJdtdxCwmDTtK00uUgvHUt9b361.webp', 'price' => '3000000' ,'description' => 'Hàng VN chất lượng cao' ],
            ['name' => 'Sản phẩm 4', 'image' => 'public/products/bV6fRiy1UZAdNCotv3fMNmK6SFomHd8RyUCE9las.webp', 'price' => '4000000' ,'description' => 'Hàng VN chất lượng cao' ],
            ['name' => 'Sản phẩm 5', 'image' => 'public/products/e93rMsMsdR6iAoSQcOB39ieivDIiMlSHppjah8ja.webp', 'price' => '7000000' ,'description' => 'Hàng VN chất lượng cao' ],
            ['name' => 'Sản phẩm 6', 'image' => 'public/products/3wu9PeaoVvx0WfJdtdxCwmDTtK00uUgvHUt9b361.webp', 'price' => '2000000' ,'description' => 'Hàng VN chất lượng cao' ],
        ]);
    }
}
