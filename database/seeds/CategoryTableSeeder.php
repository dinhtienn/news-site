<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parent_categories = [
            'Thể thao',
            'Thời trang',
            'Đời sống',
            'Công nghệ',
            'Xe cộ',
        ];
        $children_categories = [
            'Gym' => 'Thể thao',
            'Bóng đá' => 'Thể thao',
            'Bóng rổ' => 'Thể thao',
            'Lập trình' => 'Công nghệ',
            'Đồ công nghệ' => 'Công nghệ',
            'Phân khối lớn' => 'Xe cộ',
            'Xế hộp' => 'Xe cộ',
        ];

        foreach ($parent_categories as $category) {
            if (!DB::table('categories')->where('name', $category)->first()) {
                DB::table('categories')->insert([
                    'name' => $category,
                    'slug' => str_slug($category, '-'),
                ]);
            }
        }
        foreach ($children_categories as $child => $parent) {
            if (!DB::table('categories')->where('name', $child)->first()) {
                $parent_id = DB::table('categories')->where('name', $parent)->first()->id;
                DB::table('categories')->insert([
                    'name' => $child,
                    'slug' => str_slug($child, '-'),
                    'parent_id' => $parent_id,
                ]);
            }
        }
    }
}
