<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category;
        $category->name = '카페에서 주문하기';
        $category->level = 'easy';
        $category->image = '';
        $category->description = '카페에서 주문하기 회화 예시입니다.';

        $category->save();

        $category = new Category;
        $category->name = '인사하기';
        $category->level = 'easy';
        $category->image = '';
        $category->description = '인사하기 회화 예시입니다.';

        $category->save();
    }
}
