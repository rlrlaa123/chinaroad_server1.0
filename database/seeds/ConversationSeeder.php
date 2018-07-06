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
        // 일반회화/카페에서 인사하기
        $conversation = new Conversation;

        $conversation->category_id = \App\Category::where('name', '일반회화')->first()->id;
        $conversation->name = '카페에서 인사하기';

        $conversation->korean1 = '야, 어떻게 지냈어? 우리 본 지 정말 오래 됐네.';
        $conversation->chinese_c1 = '喂，你过得怎么样？我们好久没见面了.';
        $conversation->chinese_e1 = 'wèi，nǐ guò de zěn me yàng？ wǒ men hǎojiǔ  méi jiàn miàn le.';

        $conversation->korean2 = '그러게. 나는 잘 지냈어. 너는 그 동안 어떻게 지냈어?';
        $conversation->chinese_c2 = '是啊，我过得很好，你最近过得如何？';
        $conversation->chinese_e2 = 'shìa ，wǒ guò de hěn hǎo，nǐ zuì  jìn guò de rú hé？';

        $conversation->korean3 = '나도 일 때문에 바쁘긴 했는데 잘 지냈어.';
        $conversation->chinese_c3 = '因为工作，虽然有点忙，但是过得很好.';
        $conversation->chinese_e3 = 'yīn wèi gōngzuò ，suī rán yǒu diǎn máng，dàn shìguò de  hěn hǎo.';

        $conversation->image1 = 'images/conversations/' . time();

        $conversation->save();

        // 일반회화/거리에서 인사하기
        $conversation = new Conversation;

        $conversation->category_id = \App\Category::where('name', '일반회화')->first()->id;
        $conversation->name = '거리에서 인사하기';

        $conversation->korean1 = '안녕, “小龙”. 주말은 잘 보냈니?';
        $conversation->chinese_c1 = '你好，‘小龙’,  周末过得好吗？';
        $conversation->chinese_e1 = 'nǐ hǎo，‘xiǎo lóng’, zhōu mò guò de  hǎo ma？';

        $conversation->korean2 = '응, 잘 보냈어. 너는 주말 잘 보냈어?';
        $conversation->chinese_c2 = '嗯，过得很好，你呢？';
        $conversation->chinese_e2 = 'èng， guòde hěn hǎo，nǐ ne？';

        $conversation->korean3 = '나도 정말 좋았어. 물어봐 줘서 고마워.';
        $conversation->chinese_c3 = '我也过得很好，谢谢你的关心.';
        $conversation->chinese_e3 = 'wǒ yěguòde hěn hǎo，xiè xie nǐ de guān xīn.';

        $conversation->image1 = 'images/conversations/' . (time() + 1);

        $conversation->save();

        // 카페/주문하기
        $conversation = new Conversation;

        $conversation->category_id = \App\Category::where('name', '카페')->first()->id;
        $conversation->name = '주문하기';

        $conversation->korean1 = '어서오세요. 주문하시겠어요?';
        $conversation->chinese_c1 = '欢迎光临，请问您需要什么？';
        $conversation->chinese_e1 = 'huān yíng guāng lín，qǐng wèn nín xū yào shén me？';

        $conversation->korean2 = '네, 따뜻한 아메리카노 한 잔과 오렌지 쥬스 한 잔 주세요.';
        $conversation->chinese_c2 = '请给我一杯热的美式咖啡和一杯橙汁.';
        $conversation->chinese_e2 = 'qǐng gěi wǒ yì bēi rè de měi shì kā fēi hé  yì bēi chéng zhī.';

        $conversation->korean3 = '네, 합계 7,800원입니다. 쿠폰이나 할인카드 있으신가요?';
        $conversation->chinese_c3 = '好的，一共7,800韩元，请问您有优惠券或优惠卡吗？';
        $conversation->chinese_e3 = 'hǎo de，yígòng7,800 hán yuán，qǐng wèn nín yǒu yōu huì quàn huò yōuhuì  kǎ ma？';

        $conversation->korean4 = '아뇨, 없습니다.';
        $conversation->chinese_c4 = '不 ，没有.';
        $conversation->chinese_e4 = 'bù，méi yǒu.';

        $conversation->korean5 = '알겠습니다. 결제는 어떻게 하시겠어요? 현금으로 하시겠어요, 신용카드로 하시겠어요?';
        $conversation->chinese_c5 = '知道了，请问您如何结算？是使用现金呢？还是使用信用卡?';
        $conversation->chinese_e5 = 'zhī dào le，qǐng wèn nín rú hé jié suàn？ shì shǐ yòng xiàn jīn ne？ hái shì shǐ yòng xìn yòng kǎ？';

        $conversation->korean6 = '현금으로 해주세요.';
        $conversation->chinese_c6 = '现金结算.';
        $conversation->chinese_e6 = 'xiàn jīn jié suàn.';

        $conversation->korean7 = '네, 결제 완료 됐습니다. 진동벨을 가지고 자리에서 기다려 주세요.';
        $conversation->chinese_c7 = '好的，结算好了，请拿着震动铃在座位上稍等.';
        $conversation->chinese_e7 = 'hǎo de，jié suàn hǎo le，qǐng ná zhe zhèn dòng líng zài zuò wèi shàng shāo děng.';

        $conversation->korean8 = '네, 감사합니다.';
        $conversation->chinese_c8 = '好的，谢谢.';
        $conversation->chinese_e8 = 'hǎo de，xièxie.';

        $conversation->image1 = 'images/conversations/' . (time() + 2);

        $conversation->save();

        // 레스토랑/주문하기
        $conversation = new Conversation;

        $conversation->category_id = \App\Category::where('name', '레스토랑')->first()->id;
        $conversation->name = '주문하기';

        $conversation->korean1 = '주문하시겠어요?';
        $conversation->chinese_c1 = '请问，要点菜吗？';
        $conversation->chinese_e1 = 'qǐng wèn，yào diǎn cài ma？';

        $conversation->korean2 = '네, 여기 연어 크림 파스타와, 스테이크를 주세요.';
        $conversation->chinese_c2 = '是的，请给我们煎三文鱼奶油意大利面和烤牛排.';
        $conversation->chinese_e2 = 'shì de，qǐng gěi wǒ men jiān sān wén yú nǎi yóu yì dà lì miàn hé kǎoniúpái.';

        $conversation->korean3 = '고기 굽기는 어떻게 해드릴까요?';
        $conversation->chinese_c3 = '牛排要几分熟的？';
        $conversation->chinese_e3 = 'niúpái yào jǐ fēn shú de？';

        $conversation->korean4 = '미디움으로 해주세요.';
        $conversation->chinese_c4 = '五分熟的.';
        $conversation->chinese_e4 = 'wǔ fēn shúde.';

        $conversation->image1 = 'images/conversations/' . (time() + 3);

        $conversation->save();

        // 레스토랑/파스타 주문하기
        $conversation = new Conversation;

        $conversation->category_id = \App\Category::where('name', '레스토랑')->first()->id;
        $conversation->name = '파스타 주문하기';

        $conversation->korean1 = '너는 어떤 파스타를 가장 좋아해?';
        $conversation->chinese_c1 = '你最喜欢哪种意大利面呢？';
        $conversation->chinese_e1 = 'nǐ zuì xǐ huan nǎ zhǒng yì dà lì miàn ne？';

        $conversation->korean2 = '나는 오일 파스타가 제일 좋아. 느끼하지 않고 맛이 깔끔한 것 같아.';
        $conversation->chinese_c2 = '我最喜欢油类意大利面，一点都不油腻，味道干净醇和.';
        $conversation->chinese_e2 = 'wǒ zuì xǐ huan  yóu lèi yì dà lì miàn， yì  diǎn dōu bù yóu nì， wèi dào gān jìng chún hé.';

        $conversation->korean3 = '여기 연어 크림 파스타 맛은 좀 어때?';
        $conversation->chinese_c3 = '这里煎三文鱼奶油意大利面味道如何呢？';
        $conversation->chinese_e3 = 'Zhèli jiān sān wén yú nǎi yóu yì dà lì miàn wèi dào rú hé ne？';

        $conversation->korean4 = '맛있긴 한데 좀 느끼한 것 같아.';
        $conversation->chinese_c4 = '好吃是好吃, 但是感觉有些油腻.';
        $conversation->chinese_e4 = 'hǎo chī shì hǎo chī, dànshìgǎn jué yǒu xiē yóu nì.';

        $conversation->image1 = 'images/conversations/' . (time() + 4);

        $conversation->save();

        // 레스토랑/와인 주문하기
        $conversation = new Conversation;

        $conversation->category_id = \App\Category::where('name', '레스토랑')->first()->id;
        $conversation->name = '와인 주문하기';

        $conversation->korean1 = '와인도 한 잔 할까? 스테이크와 함께 마시면 정말 맛있을 것 같아.';
        $conversation->chinese_c1 = '喝杯葡萄酒如何呢？和牛排一起吃的话，味道应该真的非常好.';
        $conversation->chinese_e1 = 'hē bēi pú táo jiǔ rú hé ne？ hé niú pái yì qǐ hē de huà，wèi dào zhēn de fēi cháng hǎo.';

        $conversation->korean2 = '응, 좋아. 그럼 레드 와인으로 한 병 시키자. 여기 레드 와인을 한 병만 주세요.';
        $conversation->chinese_c2 = '嗯, 好的. 那点一瓶红葡萄酒吧. 嗯, 请给我们一瓶红葡萄酒.';
        $conversation->chinese_e2 = 'èng，hǎo de, nà diǎn yìpíng hóng pú táojiǔ ba. èng，  qǐng gěi wǒ men yì  píng hóng pú táojiǔ.';

        $conversation->korean3 = '와인은 종류가 너무 많아서 헷갈리더라. 혹시 와인의 종류에 대해서 알고 있니?';
        $conversation->chinese_c3 = '葡萄酒的种类太多了，搞不清楚，你对葡萄酒的种类了解吗？';
        $conversation->chinese_e3 = 'pú táo jiǔ de zhǒng lèi tài duō  le, gǎo bù qīng chu. nǐ duì pú táojiǔ de zhǒng lèi liǎo jiě ma？';

        $conversation->korean4 = '색상에 따라 레드 와인, 화이트 와인, 로제 와인이 있는 걸로 알고 있어.';
        $conversation->chinese_c4 = '根据颜色可以分为红葡萄酒、 白葡萄酒、桃红葡萄酒， 只知道这些.';
        $conversation->chinese_e4 = 'gēn jù yán sè kě yǐ fēn wéi hóng pú táojiǔ, bái pú táo jiǔ, táo hóng pú táojiǔ, zhǐ zhī dào zhè xiē.';

        $conversation->korean5 = '보통 스테이크 같은 고기류에는 레드와인을 마시는 거지?';
        $conversation->chinese_c5 = '普通像牛排这样的肉类 和红葡萄酒一起吃的话 味道应该真的非常好 对吧？';
        $conversation->chinese_e5 = 'pǔ tōng xiàng niú pái zhè yàng de ròu lèi hé hóng pú táo jiǔ  yìqǐ chī，duì ba？';

        $conversation->korean6 = '응, 일반적으로 레드 와인은 스테이크류, 화이트 와인은 생선류의 음식과 어울린다고 하더라.';
        $conversation->chinese_c6 = '嗯, 一般红葡萄酒配牛排类，白葡萄酒配鱼类的食物比较配.';
        $conversation->chinese_e6 = 'èng, yìbān hóng pú táo jiǔ hé niú pái lèi，bái pú táo jiǔ hé yú lèi de shí wù bǐ jiào pèi.';

        $conversation->image1 = 'images/conversations/' . (time() + 5);

        $conversation->save();
    }
}
