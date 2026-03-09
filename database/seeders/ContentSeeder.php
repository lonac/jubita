<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Content\Content;
use App\Models\Setting\Category;
use App\Models\Setting\PostType;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $author = User::first();
        if (!$author) return;

        $newsType = PostType::where('name', 'News')->first();
        $typeId = $newsType ? $newsType->id : 1;

        $data = [
            // JIOPOLITIKI (More Samples)
            [
                'category' => 'JIOPOLITIKI',
                'title' => 'Diplomasia: Tanzania Yaongoza Mashauriano ya Amani Mashariki mwa DRC',
                'excerpt' => 'Rais Samia Suluhu Hassan azungumza na viongozi wa kikanda kuimarisha usalama wa mpaka.',
                'content' => 'Jitihada hizi zimepokelewa kwa hisia chanya na mataifa ya SADC na EAC.',
                'is_featured' => true,
            ],
            [
                'category' => 'JIOPOLITIKI',
                'title' => 'Umoja wa Mataifa Wapokea Ripoti ya Maendeleo ya Binadamu Kutoka Tanzania',
                'excerpt' => 'Tanzania yapiga hatua kubwa katika upatikanaji wa huduma za jamii.',
                'content' => 'Ripoti hii inaonyesha ukuaji wa kuridhisha wa viashiria vya maisha ya binadamu nchini.',
                'is_featured' => false,
            ],
            [
                'category' => 'JIOPOLITIKI',
                'title' => 'Uhusiano wa Kidiplomasia: Tanzania na China Zaimarisha Ushirikiano wa Kiuchumi',
                'excerpt' => 'Mkataba mpya wa ujenzi wa miundombinu wasainiwa jijini Beijing.',
                'content' => 'Ushirikiano huu unalenga kukuza sekta ya viwanda na teknolojia nchini Tanzania.',
                'is_featured' => false,
            ],
            [
                'category' => 'JIOPOLITIKI',
                'title' => 'Tanzania Yachaguliwa Katika Baraza la Amani la Umoja wa Afrika',
                'excerpt' => 'Nafasi hii itaongeza ushawishi wa nchi katika masuala ya usalama barani.',
                'content' => 'Uteuzi huu ni matokeo ya msimamo wa nchi katika kutatua migogoro kwa njia ya amani.',
                'is_featured' => false,
            ],

            // BIASHARA (More Samples)
            [
                'category' => 'BIASHARA',
                'title' => 'Soko la Bidhaa (TMX): Minada ya Ufuta Yarekodi Bei ya Juu ya Kihistoria',
                'excerpt' => 'Wakulima wa Lindi na Mtwara wanufaika na mfumo wa wazi wa mauzo.',
                'content' => 'Ongezeko hili la bei linachangiwa na mahitaji makubwa ya ufuta katika soko la kimataifa.',
                'is_featured' => false,
            ],
            [
                'category' => 'BIASHARA',
                'title' => 'Uwekezaji: Kiwanda Kipya cha Mbolea Kuanza Kazi Mkoani Dodoma',
                'excerpt' => 'Kiwanda hiki kinatarajiwa kupunguza utegemezi wa mbolea kutoka nje ya nchi.',
                'content' => 'Hii itasaidia kupunguza gharama za uzalishaji kwa wakulima wa ndani.',
                'is_featured' => false,
            ],
            [
                'category' => 'BIASHARA',
                'title' => 'Sera za Biashara: Serikali Yapunguza Kodi kwa Bidhaa za Export',
                'excerpt' => 'Mkakati huu unalenga kuongeza ushindani wa bidhaa za Tanzania duniani.',
                'content' => 'Wafanyabiashara wamekaribisha hatua hii kama mkombozi wa soko la nje.',
                'is_featured' => false,
            ],
            [
                'category' => 'BIASHARA',
                'title' => 'Zantel na Tigo Zaungana: Mapinduzi Mapya katika Sekta ya Mawasiliano',
                'excerpt' => 'Kuungana huku kutatoa huduma bora na za bei nafuu kwa wateja wengi zaidi.',
                'content' => 'Kampuni mpya inatarajia kuwekeza zaidi katika teknolojia ya 5G.',
                'is_featured' => false,
            ],

            // MASOKO (More Samples)
            [
                'category' => 'MASOKO',
                'title' => 'Hisa za NMB na CRDB Zazidi Kupanda Kufuatia Ripoti za Faida Kubwa',
                'excerpt' => 'Wawekezaji katika soko la hisa la Dar es Salaam (DSE) wanufaika.',
                'content' => 'Sekta ya kibenki nchini Tanzania imeendelea kuwa imara na kutoa imani kwa wawekezaji.',
                'is_featured' => false,
            ],
            [
                'category' => 'MASOKO',
                'title' => 'Soko la Dhahabu: Bei Yaongezeka kwa 5% Katika Soko la Dunia',
                'excerpt' => 'Wachimbaji wa Tanzania waaswa kuongeza uzalishaji ili kutumia fursa hii.',
                'content' => 'Thamani ya dhahabu imeendelea kuwa kimbilio la wawekezaji wakati wa mfumuko wa bei.',
                'is_featured' => false,
            ],
            [
                'category' => 'MASOKO',
                'title' => 'Hisa za TBL Zaimarika Kufuatia Ongezeko la Mauzo ya Bidhaa Nje',
                'excerpt' => 'Ripoti ya robo mwaka ya kampuni yaonyesha ukuaji wa kuridhisha.',
                'content' => 'Wawekezaji wengi wameanza kununua hisa za TBL kwa matarajio ya gawio kubwa.',
                'is_featured' => false,
            ],
            [
                'category' => 'MASOKO',
                'title' => 'Vifungo vya Serikali: Mahitaji Yazidi Kiwango cha Fedha Zilizotafutwa',
                'excerpt' => 'Hali hii inaonyesha imani kubwa ya watu katika usalama wa dhamana za serikali.',
                'content' => 'Benki Kuu imetangaza kuwa minada ya vifungo itaendelea kuwa ya wazi na ushindani.',
                'is_featured' => false,
            ],
            [
                'category' => 'MASOKO',
                'title' => 'Soko la Pamba: Wakulima Wapata Neema ya Bei Mpya Elekezi',
                'excerpt' => 'Bodi ya Pamba yatangaza bei inayozingatia gharama za uzalishaji.',
                'content' => 'Wakulima wamehimizwa kupeleka pamba iliyo safi sokoni ili kupata thamani halisi.',
                'is_featured' => false,
            ],
            [
                'category' => 'MASOKO',
                'title' => 'Fedha za Kigeni: Shilingi Yaendelea Kuwa Imara Dhidi ya Euro',
                'excerpt' => 'Mizania ya biashara na nchi za Ulaya yaanza kuleta tija kwa shilingi.',
                'content' => 'Utulivu huu ni muhimu kwa waagizaji wa mashine na malighafi kutoka Ulaya.',
                'is_featured' => false,
            ],

            // TEKNOLOJIA (More Samples)
            [
                'category' => 'TEKNOLOJIA',
                'title' => 'Artificial Intelligence: Jinsi AI Inavyobadilisha Kilimo cha Kisasa',
                'excerpt' => 'Teknolojia ya utambuzi wa wadudu inasaidia wakulima kupunguza hasara.',
                'content' => 'Programu mpya iliyozinduliwa inaweza kutambua ugonjwa wa mmea kwa kupiga picha.',
                'is_featured' => false,
            ],
            [
                'category' => 'TEKNOLOJIA',
                'title' => 'Mapinduzi ya 5G: Kasi ya Internet Yaongezeka Mara 10',
                'excerpt' => 'Kampuni za simu zakamilisha uwekaji wa miundombinu ya 5G jijini Dar.',
                'content' => 'Hii itafungua fursa mpya za biashara ya kielektroniki na elimu ya mbali.',
                'is_featured' => false,
            ],
            [
                'category' => 'TEKNOLOJIA',
                'title' => 'Blockchain katika Ardhi: Serikali Kujaribu Mfumo Mpya wa Hati Miliki',
                'excerpt' => 'Mfumo huu unalenga kuondoa migogoro ya ardhi na kuzuia kughushi hati.',
                'content' => 'Teknolojia ya Blockchain inatoa usalama wa hali ya juu kwa kumbukumbu za kisheria.',
                'is_featured' => false,
            ],
            [
                'category' => 'TEKNOLOJIA',
                'title' => 'Roboti Shuleni: Shule za Awali Dodoma Zaanza Kufundisha Programu za Awali',
                'excerpt' => 'Watoto wataanza kujifunza misingi ya Coding na Robotiki tangu wakiwa wadogo.',
                'content' => 'Lengo ni kuandaa kizazi kijacho kinachoweza kushindana katika uchumi wa kidijitali.',
                'is_featured' => false,
            ],
        ];

        foreach ($data as $item) {
            $cat = Category::where('name', $item['category'])->first();
            if ($cat) {
                Content::updateOrCreate(
                    ['slug' => Str::slug($item['title'])],
                    [
                        'title' => $item['title'],
                        'excerpt' => $item['excerpt'],
                        'content' => $item['content'],
                        'category_id' => $cat->id,
                        'author_id' => $author->id,
                        'post_type_id' => $typeId,
                        'status' => 'published',
                        'is_featured' => $item['is_featured'],
                        'published_at' => Carbon::now(),
                    ]
                );
            }
        }
    }
}
