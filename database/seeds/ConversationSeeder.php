<?php

use Illuminate\Database\Seeder;
use App\Conversation;

class ConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conversation = new Conversation;

        $conversation->category_id = \App\Category::where('name', '카페에서 주문하기')->first()->id;
        $conversation->name = '카페에서 리필하기';

        $conversation->korean1 = '리필 가능한가요?';
        $conversation->chinese_c1 = '可以再填充吗？';
        $conversation->chinese_e1 = 'Kěyǐ zài tiánchōng ma?';

        $conversation->korean2 = '가능해요';
        $conversation->chinese_c2 = '好';
        $conversation->chinese_e2 = 'hǎo';

        $conversation->image1 = 'images/conversations/' . time();

        $conversation->save();

        $conversation = new Conversation;

        $conversation->category_id = \App\Category::where('name', '인사하기')->first()->id;
        $conversation->name = '반갑게 인사하기';

        $conversation->korean1 = '오랜만이야! 잘 지냈어?';
        $conversation->chinese_c1 = '已经有一段时间了！你好吗？';
        $conversation->chinese_e1 = 'Yǐjīng yǒu yīduàn shíjiānle! Nǐ hǎo ma?';

        $conversation->korean2 = '잘 지냈어, 너는?';
        $conversation->chinese_c2 = '我没事, 你呢?';
        $conversation->chinese_e2 = 'Wǒ méishì, nǐ ne?';

        $conversation->image1 = 'images/conversations/' . (time() + 1);

        $conversation->save();
    }
}
