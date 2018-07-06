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
        $category->name = '일반회화';
        $category->level = 'easy';
        $category->image = '';
        $category->description = '일반회화 회화 예시입니다.';

        $category->save();

        $category = new Category;
        $category->name = '카페';
        $category->level = 'easy';
        $category->image = '';
        $category->description = '카페 회화 예시입니다.';

        $category->save();

        $category = new Category;
        $category->name = '레스토랑';
        $category->level = 'hard';
        $category->image = '';
        $category->description = '레스토랑 회화 예시입니다.';

        $category->save();
    }
}
