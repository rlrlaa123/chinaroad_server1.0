<?php

use Illuminate\Database\Seeder;
use App\Classification;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Classification();
        $category->name = '과학/IT';

        $category->save();

        $category = new Classification();
        $category->name = '사회/문화';

        $category->save();

        $category = new Classification();
        $category->name = '정치';

        $category->save();

        $category = new Classification();
        $category->name = '경제';

        $category->save();

        $category = new Classification();
        $category->name = '연예';

        $category->save();

        $category = new Classification();
        $category->name = '스포츠';

        $category->save();

        $category = new Classification();
        $category->name = '관광명소';

        $category->save();
    }
}
