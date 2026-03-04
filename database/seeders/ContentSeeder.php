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
            [
                'category' => 'JIOPOLITIKI',
                'title' => 'Tanzania na DRC Zasaini Makubaliano Mapya ya Kibiashara na Usalama',
                'excerpt' => 'Rais Samia Suluhu Hassan amewasilisha mkakati mpya wa kukuza biashara ya mipakani na kuimarisha usalama wa kikanda.',
                'content' => 'Serikali ya Jamhuri ya Muungano wa Tanzania na Jamhuri ya Kidemokrasia ya Kongo (DRC) zimeingia mkataba wa kihistoria unaolenga kuondoa vikwazo vya kibiashara na kuimarisha ushirikiano wa kijeshi katika mpaka wa mashariki.',
                'is_featured' => true,
            ],
            [
                'category' => 'UCHUMI',
                'title' => 'Ripoti ya Benki Kuu: Akiba ya Fedha za Kigeni Yaongezeka kwa 15%',
                'excerpt' => 'Benki Kuu ya Tanzania (BoT) imetangaza kuwa uchumi unaendelea kuimarika kutokana na ongezeko la mauzo ya dhahabu na bidhaa za kilimo.',
                'content' => 'Gavana wa Benki Kuu amebainisha kuwa akiba ya fedha za kigeni sasa inaweza kutosheleza uagizaji wa bidhaa kwa miezi sita ijayo, hatua inayopunguza shinikizo la mfumuko wa bei.',
                'is_featured' => false,
            ],
            [
                'category' => 'BIASHARA',
                'title' => 'Soko la Bidhaa la Tanzania (TMX) Kuanza Kuuza Kahawa kwa Mfumo wa Kidijitali',
                'excerpt' => 'Wakulima wa kahawa kutoka mikoa ya Kilimanjaro na Kagera sasa wataweza kupata bei bora kupitia minada ya kielektroniki.',
                'content' => 'Mfumo huu mpya unalenga kuondoa madalali wasio waaminifu na kuhakikisha mkulima anapata malipo yake kwa wakati kupitia akaunti za benki au huduma za fedha kwa simu.',
                'is_featured' => false,
            ],
            [
                'category' => 'TEKNOLOJIA',
                'title' => 'Serikali Yazindua Mkongo wa Taifa wa Mawasiliano Kufika Vijijini',
                'excerpt' => 'Wizara ya Habari na Teknolojia imekamilisha awamu ya nne ya usambazaji wa mkongo wa taifa unaolenga kuongeza kasi ya internet.',
                'content' => 'Zaidi ya vijiji 500 sasa vitafikiwa na huduma ya internet yenye kasi kubwa, hatua itakayochochea ukuaji wa biashara za kidijitali na elimu masafa.',
                'is_featured' => false,
            ],
            [
                'category' => 'MASOKO',
                'title' => 'Bei ya Dhahabu Yapanda Katika Masoko ya Kimataifa, Wachimbaji Wadogo Tanzania Wanufaika',
                'excerpt' => 'Ongezeko la thamani ya dhahabu duniani limetafsiriwa kuwa neema kwa mikoa ya Geita na Mara nchini Tanzania.',
                'content' => 'Bei ya dhahabu imefikia rekodi mpya, hatua inayosaidia kuongeza kipato kwa wachimbaji wadogo waliojiunga katika vikundi vya ushirika.',
                'is_featured' => false,
            ],
            [
                'category' => 'UCHUMI',
                'title' => 'Mfumuko wa Bei Nchini Tanzania Wapungua Mpaka Asilimia 3.1 mwezi Februari',
                'excerpt' => 'Ofisi ya Taifa ya Takwimu (NBS) imesema kuwa kupungua kwa bei za vyakula kumekua sababu kuu ya kupungua kwa mfumuko wa bei.',
                'content' => 'NBS imebainisha kuwa hali ya upatikanaji wa chakula nchini ni nzuri, jambo linalosaidia kupunguza gharama za maisha kwa wananchi wa hali ya chini na kati.',
                'is_featured' => false,
            ],
            [
                'category' => 'JIOPOLITIKI',
                'title' => 'Tanzania Yachaguliwa Kuongoza Kamati ya Amani na Usalama ya Umoja wa Afrika',
                'excerpt' => 'Uteuzi huo ni ishara ya imani ya mataifa mengine kwa jitihada za Tanzania katika kudumisha amani na diplomasia barani Afrika.',
                'content' => 'Nchi wanachama wa Umoja wa Afrika (AU) zimeipongeza Tanzania kwa msimamo wake wa upatanishi katika migogoro mbalimbali inayojitokeza barani humo.',
                'is_featured' => false,
            ],
            [
                'category' => 'BIASHARA',
                'title' => 'Fursa Mpya kwa Wajasiriamali: Serikali Yapunguza Masharti ya Mikopo ya 10%',
                'excerpt' => 'Mabadiliko ya sera sasa yataruhusu vikundi vingi zaidi vya vijana, wanawake na walemavu kupata mitaji ya kuanzisha biashara.',
                'content' => 'Waziri wa Tamisemi ametangaza kuwa mfumo mpya wa usimamizi wa mikopo hiyo utapunguza urasimu na kuhakikisha fedha zinawafikia walengwa kwa wakati.',
                'is_featured' => false,
            ],
            [
                'category' => 'TEKNOLOJIA',
                'title' => 'Kampuni ya Fintech ya Kitanzania Yashinda Tuzo ya Ubunifu Afrika Mashariki',
                'excerpt' => 'Ubunifu wa mfumo wa malipo ya kidijitali unaotumika na wafanyabiashara wadogo umeiletea nchi heshima kubwa.',
                'content' => 'Mfumo huo unawawezesha wachuuzi wadogo (Machinga) kupokea malipo kwa njia ya simu bila kuhitaji vifaa ghali vya kielektroniki.',
                'is_featured' => false,
            ],
            [
                'category' => 'MASOKO',
                'title' => 'Soko la Hisa la Dar es Salaam (DSE) Larekodi Ongezeko la Mauzo ya Hisa',
                'excerpt' => 'Hisa za makampuni ya benki na viwanda zimeendelea kuwavutia wawekezaji wengi kutokana na kutoa gawio zuri.',
                'content' => 'Ripoti ya robo mwaka ya DSE inaonyesha kuwa imani ya wawekezaji wa ndani na nje ya nchi imeongezeka, hatua inayochochea ukuaji wa soko la mitaji.',
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
