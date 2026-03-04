<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Content\Content;
use App\Models\Setting\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $author = User::first();
        if (!$author) return;

        $data = [
            [
                'category' => 'Jiopolitiki',
                'title' => 'Tanzania na DRC Zasaini Makubaliano Mapya ya Kibiashara na Usalama',
                'excerpt' => 'Rais Samia Suluhu Hassan amewasilisha mkakati mpya wa kukuza biashara ya mipakani na kuimarisha usalama wa kikanda.',
                'content' => 'Serikali ya Jamhuri ya Muungano wa Tanzania na Jamhuri ya Kidemokrasia ya Kongo (DRC) zimeingia mkataba wa kihistoria unaolenga kuondoa vikwazo vya kibiashara na kuimarisha ushirikiano wa kijeshi katika mpaka wa mashariki.',
                'is_featured' => true,
            ],
            [
                'category' => 'Uchumi',
                'title' => 'Ripoti ya Benki Kuu: Akiba ya Fedha za Kigeni Yaongezeka kwa 15%',
                'excerpt' => 'Benki Kuu ya Tanzania (BoT) imetangaza kuwa uchumi unaendelea kuimarika kutokana na ongezeko la mauzo ya dhahabu na bidhaa za kilimo.',
                'content' => 'Gavana wa Benki Kuu amebainisha kuwa akiba ya fedha za kigeni sasa inaweza kutosheleza uagizaji wa bidhaa kwa miezi sita ijayo, hatua inayopunguza shinikizo la mfumuko wa bei.',
                'is_featured' => false,
            ],
            [
                'category' => 'Biashara',
                'title' => 'Soko la Bidhaa la Tanzania (TMX) Kuanza Kuuza Kahawa kwa Mfumo wa Kidijitali',
                'excerpt' => 'Wakulima wa kahawa kutoka mikoa ya Kilimanjaro na Kagera sasa wataweza kupata bei bora kupitia minada ya kielektroniki.',
                'content' => 'Mfumo huu mpya unalenga kuondoa madalali wasio waaminifu na kuhakikisha mkulima anapata malipo yake kwa wakati kupitia akaunti za benki au huduma za fedha kwa simu.',
                'is_featured' => false,
            ],
            [
                'category' => 'Teknolojia',
                'title' => 'Serikali Yazindua Mkongo wa Taifa wa Mawasiliano Kufika Vijijini',
                'excerpt' => 'Wizara ya Habari na Teknolojia imekamilisha awamu ya nne ya usambazaji wa mkongo wa taifa unaolenga kuongeza kasi ya internet.',
                'content' => 'Zaidi ya vijiji 500 sasa vitafikiwa na huduma ya internet yenye kasi kubwa, hatua itakayochochea ukuaji wa biashara za kidijitali na elimu masafa.',
                'is_featured' => false,
            ],
            [
                'category' => 'Masoko',
                'title' => 'Bei ya Dhahabu Yapanda Katika Masoko ya Kimataifa, Wachimbaji Wadogo Tanzania Wanufaika',
                'excerpt' => 'Ongezeko la thamani ya dhahabu duniani limetafsiriwa kuwa neema kwa mikoa ya Geita na Mara nchini Tanzania.',
                'content' => 'Bei ya dhahabu imefikia rekodi mpya, hatua inayosaidia kuongeza kipato kwa wachimbaji wadogo waliojiunga katika vikundi vya ushirika.',
                'is_featured' => false,
            ],
            [
                'category' => 'Advisory',
                'title' => 'Jinsi ya Kuwekeza Katika Dhamana za Serikali (Treasury Bills) kwa Mwaka 2026',
                'excerpt' => 'Mwongozo huu unakupa hatua kwa hatua jinsi ya kuanza kuwekeza kupitia Benki Kuu ya Tanzania kwa usalama zaidi.',
                'content' => 'Uwekezaji katika dhamana za serikali unatajwa kuwa ni miongoni mwa njia salama zaidi za kukuza mtaji wako kwa faida ya uhakika.',
                'is_featured' => false,
            ],
            [
                'category' => 'Lifestyle',
                'title' => 'Utalii wa Ndani: Mbuga ya Taifa ya Ruaha Yaongoza kwa Kuvutia Watalii wa Kitanzania',
                'excerpt' => 'Uzuri wa asili na ukaribu wa mbuga hiyo na mikoa ya nyanda za juu kusini umechochea ukuaji wa utalii wa ndani.',
                'content' => 'Serikali imepunguza gharama za viingilio kwa raia wa Tanzania, hatua inayosaidia watanzania wengi kuthamini na kutembelea mbuga zao za taifa.',
                'is_featured' => false,
            ],
        ];

        foreach ($data as $item) {
            $cat = Category::where('name', $item['category'])->first();
            if ($cat) {
                Content::create([
                    'title' => $item['title'],
                    'slug' => Str::slug($item['title']),
                    'excerpt' => $item['excerpt'],
                    'content' => $item['content'],
                    'category_id' => $cat->id,
                    'author_id' => $author->id,
                    'status' => 'published',
                    'is_featured' => $item['is_featured'],
                    'published_at' => Carbon::now(),
                ]);
            }
        }
    }
}
