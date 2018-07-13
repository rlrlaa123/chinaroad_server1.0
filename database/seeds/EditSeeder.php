<?php

use Illuminate\Database\Seeder;
use App\Edit;
use \Carbon\Carbon;

class EditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $edit = new Edit;

        $edit->date = Carbon::now()->toDateString();
        $edit->level = 'easy';
        $edit->image = 'images/edits/' . time();
        $edit->question_ko = '한국에는 어떤 스포츠가 인기가 많니?';
        $edit->answer_ko = '야구야.';
        $edit->question_ch = '什么运动在韩国很受欢迎？';
        $edit->answer_ch = '棒球之夜.';

        $edit->save();

        $edit = new Edit;

        $edit->date = Carbon::now()->toDateString();
        $edit->level = 'easy';
        $edit->image = 'images/edits/' . (time() + 1);
        $edit->question_ko = '야구장에 가본적 있니? 한국 야구장은 어떠니?';
        $edit->answer_ko = '가본적 있어, 사람이 아주 많고 열기가 대단해.';
        $edit->question_ch = '你去过棒球场吗？ 韩国棒球场怎么样？';
        $edit->answer_ch = '我去过很多人, 热度很高.';

        $edit->save();
    }
}
