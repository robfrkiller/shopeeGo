<?php

declare(strict_types=1);

use App\Lib\ChtToChs;
use PHPUnit\Framework\TestCase;

class ChtToChslTest extends TestCase
{
    protected function setUp(): void
    {
        ChtToChs::init();
    }

    public function testTrans(): void
    {
        $tests = [
            [
                'expected' => '唧唧复唧唧，木兰当户织。不闻机杼声，惟闻女叹息。问女何所思，问女何所忆。女亦无所思，女亦无所忆。昨夜见军帖，可汗大点兵，军书十二卷，卷卷有爷名。阿爷无大儿，木兰无长兄，愿为市鞍马，从此替爷征。东市买骏马，西市买鞍鞯，南市买辔头，北市买长鞭。旦辞爷娘去，暮宿黄河边，不闻爷娘唤女声，但闻黄河流水鸣溅溅。旦辞黄河去，暮至黑山头，不闻爷娘唤女声，但闻燕山胡骑鸣啾啾。万里赴戎机，关山度若飞。朔气传金柝，寒光照铁衣。将军百战死，壮士十年归。归来见天子，天子坐明堂。策勋十二转，赏赐百千强。可汗问所欲，木兰不用尚书郎，愿驰千里足，送儿还故乡。爷娘闻女来，出郭相扶将；阿姊闻妹来，当户理红妆；小弟闻姊来，磨刀霍霍向猪羊。开我东阁门，坐我西阁床，脱我战时袍，着我旧时裳。当窗理云鬓，对镜贴花黄。出门看火伴，火伴皆惊忙：同行十二年，不知木兰是女郎。雄兔脚扑朔，雌兔眼迷离；双兔傍地走，安能辨我是雄雌？',
                'origin' => '唧唧復唧唧，木蘭當戶織。不聞機杼聲，惟聞女嘆息。問女何所思，問女何所憶。女亦無所思，女亦無所憶。昨夜見軍帖，可汗大點兵，軍書十二卷，卷卷有爺名。阿爺無大兒，木蘭無長兄，願爲市鞍馬，從此替爺徵。東市買駿馬，西市買鞍韉，南市買轡頭，北市買長鞭。旦辭爺孃去，暮宿黃河邊，不聞爺孃喚女聲，但聞黃河流水鳴濺濺。旦辭黃河去，暮至黑山頭，不聞爺孃喚女聲，但聞燕山胡騎鳴啾啾。萬里赴戎機，關山度若飛。朔氣傳金柝，寒光照鐵衣。將軍百戰死，壯士十年歸。歸來見天子，天子坐明堂。策勳十二轉，賞賜百千強。可汗問所欲，木蘭不用尚書郎，願馳千里足，送兒還故鄉。爺孃聞女來，出郭相扶將；阿姊聞妹來，當戶理紅妝；小弟聞姊來，磨刀霍霍向豬羊。開我東閣門，坐我西閣牀，脫我戰時袍，著我舊時裳。當窗理雲鬢，對鏡貼花黃。出門看火伴，火伴皆驚忙：同行十二年，不知木蘭是女郎。雄兔腳撲朔，雌兔眼迷離；雙兔傍地走，安能辨我是雄雌？',
            ],
            [
                'expected' => '经过了轰轰烈烈的1111购物节，你都买了什么呢？除了3C、娱乐商品，相较于去年的防疫囤货潮，今年的热搜可是多了几分季节感！🍂秋冬换季到底大家都做了哪些准备呢？👇👇👇👇👇👇✨Top 5 挂暖机说到冬天，怕冷的同伴们最需要的就是暖暖包啦！但前阵子的暖暖包大缺货怎么办呢？来来来～买不到暖暖包没关系，可充电重复使用的挂暖机也超赞的❤️‍🔥吹出的暖风除了温暖整个空间，还可以暖衣，真的是冬天必备小家电，使用起来也更环保唷♻️✨Top 4 星巴克太妃核果拿铁随手包到了年底，许多人最爱的星巴克季节限定饮品太妃核果风味拿铁终于又回归了！现在除了买现泡的外，星巴克也推出随手包，满足大家随时随地想来一杯的心，平均一杯30元的小确幸，是不是很可以入手呢？😆🥉Top 3 卡蜜拉哈密瓜你吃过瓜界爱马仕吗⁉️ 嘉义县近年推广的种植卡蜜拉哈密瓜品种，皮薄果肉脆甜，是独一无二的瓜中极品，因此被封为瓜界爱马仕。每颗要价500到800元，虽然不便宜，但还没开卖就已经预订一空，如果下手不够快，就得再等明年啰。🥈Top 2 电热毯／石墨烯棉被天然石墨烯所产生的远红外线能让体温升温，让血流量增加、血流速增快，被称为保命毯，而且还有医疗器材的专业认证🈴。家里有中老年人的秋冬季真的很需要准备一条石墨烯棉被呀✅！如果想要快速保暖的人则可以考虑看看电热毯，不论是在办公室上班或是在家使用都很方便。相较于靠体温反射热能加热的石墨烯材质，电热毯能够快速加热减少等待时间，省时又省电，低功率也让使用上更安全！🥇Top 1 暖暖包听说今年会特别冷的冬天🥶，暖暖包已经占据BigGo热搜词好多周了～小编也是踏破铁鞋无觅处，原来就在BigGo啦！还没买到的赶快把缺货商品上架通知打开来，只要商家一补货，马上通知你🤩接下来就要迈入12月啦～天气也会变得更冷，无论在室内或室外都要做好保暖唷！😉进入冬天后，大家又会买些什么呢？就让我们拭目以待😎也欢迎底下跟小编分享你的冬天购物清单📝✅最后记得～购物前先来  比价下单还可以再赚现金回馈，是不是超赞的呀',
                'origin' => '經過了轟轟烈烈的1111購物節，你都買了什麼呢？除了3C、娛樂商品，相較於去年的防疫囤貨潮，今年的熱搜可是多了幾分季節感！🍂秋冬換季到底大家都做了哪些準備呢？👇👇👇👇👇👇✨Top 5 掛暖機說到冬天，怕冷的同伴們最需要的就是暖暖包啦！但前陣子的暖暖包大缺貨怎麼辦呢？來來來～買不到暖暖包沒關係，可充電重複使用的掛暖機也超讚的❤️‍🔥吹出的暖風除了溫暖整個空間，還可以暖衣，真的是冬天必備小家電，使用起來也更環保唷♻️✨Top 4 星巴克太妃核果拿鐵隨手包到了年底，許多人最愛的星巴克季節限定飲品太妃核果風味拿鐵終於又回歸了！現在除了買現泡的外，星巴克也推出隨手包，滿足大家隨時隨地想來一杯的心，平均一杯30元的小確幸，是不是很可以入手呢？😆🥉Top 3 卡蜜拉哈密瓜你吃過瓜界愛馬仕嗎⁉️ 嘉義縣近年推廣的種植卡蜜拉哈密瓜品種，皮薄果肉脆甜，是獨一無二的瓜中極品，因此被封為瓜界愛馬仕。每顆要價500到800元，雖然不便宜，但還沒開賣就已經預訂一空，如果下手不夠快，就得再等明年囉。🥈Top 2 電熱毯／石墨烯棉被天然石墨烯所產生的遠紅外線能讓體溫升溫，讓血流量增加、血流速增快，被稱為保命毯，而且還有醫療器材的專業認證🈴。家裡有中老年人的秋冬季真的很需要準備一條石墨烯棉被呀✅！如果想要快速保暖的人則可以考慮看看電熱毯，不論是在辦公室上班或是在家使用都很方便。相較於靠體溫反射熱能加熱的石墨烯材質，電熱毯能夠快速加熱減少等待時間，省時又省電，低功率也讓使用上更安全！🥇Top 1 暖暖包聽說今年會特別冷的冬天🥶，暖暖包已經占據BigGo熱搜詞好多週了～小編也是踏破鐵鞋無覓處，原來就在BigGo啦！還沒買到的趕快把缺貨商品上架通知打開來，只要商家一補貨，馬上通知你🤩接下來就要邁入12月啦～天氣也會變得更冷，無論在室內或室外都要做好保暖唷！😉進入冬天後，大家又會買些什麼呢？就讓我們拭目以待😎也歡迎底下跟小編分享你的冬天購物清單📝✅最後記得～購物前先來  比價下單還可以再賺現金回饋，是不是超讚的呀',
            ],
        ];

        foreach ($tests as $test) {
            $this->assertEquals(
                $test['expected'],
                ChtToChs::trans($test['origin'])
            );

            $this->assertEquals(
                $test['expected'],
                ChtToChs::transNew($test['origin'])
            );

            $this->assertEquals(
                $test['expected'],
                ChtToChs::transTW($test['origin'])
            );
        }
    }
}
