<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Content\Content;
use App\Models\Setting\Category;
use App\Models\Setting\PostType;
use App\Models\User;
use Carbon\Carbon;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $author = User::first();
        if (!$author) return;

        $postType = PostType::first();
        if (!$postType) return;

        $articles = [
            // ============ UCHUMI ============
            [
                'category' => 'uchumi',
                'title' => 'Pato la Taifa (GDP) la Tanzania Lapanda Asilimia 5.8 Mwaka 2024',
                'excerpt' => 'Benki Kuu ya Tanzania imethibitisha ukuaji wa uchumi wa asilimia 5.8 mwaka 2024, ukisukumwa na sekta ya utalii, kilimo na ujenzi wa miundombinu ya SGR.',
                'content' => '<p>Dar es Salaam — Pato la Taifa (GDP) la Tanzania limefikia ukuaji wa asilimia 5.8 mwaka 2024, kulingana na takwimu mpya zilizotolewa na Ofisi ya Taifa ya Takwimu (NBS). Hii ni matokeo mazuri zaidi ya miaka mitano iliyopita, yanayoashiria nguvu ya uchumi wa nchi yetu.</p><p>Sekta ya utalii ilisimama imara, ikijumuisha wageni zaidi ya milioni 1.8 waliotembelea Tanzania mwaka huu, ikichangia mapato ya dola za Marekani bilioni 3.5 kwa uchumi. Ujenzi wa Reli ya SGR (Standard Gauge Railway) unaendelea kuchangia ukuaji mkubwa katika sekta ya ujenzi, na matarajio ni kukamilika sehemu ya Dar es Salaam-Morogoro ifikapo mwaka 2026.</p><p>Waziri wa Fedha Dkt. Mwigulu Nchemba alisema: "Tanzania ina mwelekeo mzuri sana. Tunaendelea kuwekeza katika miundombinu na kuunda mazingira mazuri kwa wawekezaji wa ndani na nje ya nchi."</p><p>Wataalamu wa uchumi wanatahadharisha kwamba mfumuko wa bei unabaki kuwa changamoto, ukiwa asilimia 4.2 mwaka 2024, lakini unabaki ndani ya lengo la Benki Kuu la chini ya asilimia 5.0.</p>',
                'is_featured' => true,
                'published_at' => Carbon::now()->subDays(1),
            ],
            [
                'category' => 'uchumi',
                'title' => 'Benki Kuu Yapunguza Riba: Hatua Inayolenga Kukuza Mikopo kwa Biashara Ndogo',
                'excerpt' => 'Benki Kuu ya Tanzania imepunguza kiwango cha riba cha msingi kutoka asilimia 6.0 hadi 5.5, hatua inayotarajiwa kukuza ukopaji wa biashara ndogo.',
                'content' => '<p>Benki Kuu ya Tanzania (BOT) imefanya uamuzi mkubwa wa kupunguza kiwango cha riba cha msingi (Central Bank Rate - CBR) kutoka asilimia 6.0 hadi asilimia 5.5, katika mkutano wa Kamati ya Sera ya Fedha uliofanyika Dar es Salaam wiki iliyopita.</p><p>Gavana wa BOT, Dkt. Emmanuel Tutuba, alieleza kwamba hatua hii inalenga kukuza ukopaji wa biashara ndogo na za kati (SME) ambazo ni nguzo ya uchumi wa Tanzania. "Tunataka mikopo iwe rahisi zaidi kupata, hasa kwa wajasiriamali wadogo ambao wanaunda ajira nyingi," alisema.</p><p>Wasomi wa fedha wanatahadharisha kwamba athari za kupungua kwa riba zinachukua muda wa miezi mitatu hadi sita kuonekana katika uchumi halisi. Benki za biashara zitatarajiwa kufuata hatua hii kwa kupunguza riba zao za mkopo.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'category' => 'benki-na-fedha',
                'title' => 'CRDB Bank Yatangaza Faida ya Shilingi Bilioni 412 kwa Nusu ya Kwanza ya 2025',
                'excerpt' => 'CRDB Bank Plc imetangaza faida kabla ya kodi ya shilingi bilioni 412 kwa kipindi cha Januari-Juni 2025, ikionyesha ukuaji wa asilimia 18 ikilinganishwa na mwaka uliopita.',
                'content' => '<p>CRDB Bank Plc, benki kubwa zaidi ya kibiashara nchini Tanzania kulingana na thamani ya rasilimali, imetangaza matokeo mazuri ya nusu ya kwanza ya mwaka 2025. Faida kabla ya kodi imefikia shilingi bilioni 412, sawa na ongezeko la asilimia 18 ikilinganishwa na shilingi bilioni 350 za kipindi kama hicho mwaka 2024.</p><p>Mkurugenzi Mtendaji Abdulmajid Nsekuye alipongeza ukuaji huu, akisema unachangiwa na ongezeko la mikopo kwa sekta ya kilimo, ujenzi na biashara ndogo. Benki imeongeza matawi yake kufikia 270 nchini kote, pamoja na kuimarisha huduma za kidijitali kupitia programu ya SimBanking.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(3),
            ],

            // ============ BIASHARA ============
            [
                'category' => 'biashara',
                'title' => 'Wafanyabiashara Kariakoo Walalamika Bei Ghali za Forodha Bandarini Dar es Salaam',
                'excerpt' => 'Wafanyabiashara wa soko la Kariakoo wamesema ada za forodha za bandari ya Dar es Salaam zimekuwa kikwazo kikubwa cha kuagiza bidhaa, huku wito ukitolewa wa serikali kufanya maboresho.',
                'content' => '<p>Wafanyabiashara wadogo na wa kati wanaofanya biashara soko la Kariakoo, Dar es Salaam, wameitaka serikali kuangalia upya mfumo wa ada za forodha katika Bandari ya Dar es Salaam, wakisema ada hizo zimepanda kwa kiasi kinachosababisha bidhaa za nje kuwa ghali sana masokoni.</p><p>Juma Msangi, mfanyabiashara wa vifaa vya umeme, alisema: "Miaka mitatu iliyopita nilikuwa nalipa shilingi laki mbili kwa chombo kimoja. Leo nalipa shilingi laki nane. Bidhaa zinaghali mara nne, na wateja hawanunui." Kero hizi zimekuwa zikiibuka mara kwa mara hasa baada ya serikali kuongeza ada za bandari mwaka 2023 kwa lengo la kuongeza mapato ya TPA (Tanzania Ports Authority).</p><p>Msemaji wa Wizara ya Biashara alisema serikali inaangalia hoja hizi kwa makini na itafanya tathmini ya kina kabla ya mwisho wa mwaka 2025.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(4),
            ],
            [
                'category' => 'biashara',
                'title' => 'Tanzania Inapokea Uwekezaji wa Dola Milioni 450 kutoka Kampuni ya Umeme ya UAE',
                'excerpt' => 'Shirika la ACWA Power la UAE limetia saini mkataba wa ujenzi wa mitambo ya nishati ya jua yenye uwezo wa megawati 200 Tanzania, hatua kubwa katika sekta ya nishati mbadala.',
                'content' => '<p>Tanzania imepiga hatua kubwa katika sekta ya nishati mbadala baada ya kusaini mkataba mkubwa na ACWA Power, kampuni ya nishati inayomilikiwa na Serikali ya Umoja wa Falme za Kiarabu (UAE). Mkataba huu wa dola milioni 450 unalenga kujenga mitambo ya nishati ya jua yenye uwezo wa megawati 200 katika mkoa wa Dodoma.</p><p>Mradi huu unatarajiwa kukamilika mwaka 2027 na utachangia kwa kiasi kikubwa kupunguza uhaba wa umeme unaoisumbua Tanzania kwa miaka mingi. Serikali imekuwa ikifuatilia lengo lake la kuongeza uzalishaji wa umeme hadi megawati 4,915 ifikapo mwaka 2025.</p><p>Rais Samia Suluhu Hassan alisema mradi huu ni ushahidi wa imani ya wawekezaji wa kimataifa katika Tanzania, na kwamba serikali itaendelea kuunda mazingira bora ya uwekezaji.</p>',
                'is_featured' => true,
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'category' => 'hisa-dse',
                'title' => 'Soko la Hisa DSE: Thamani ya Soko Yafikia Trilioni 18.5 kwa Mwezi wa Kwanza wa 2025',
                'excerpt' => 'Soko la Hisa la Dar es Salaam (DSE) limeonyesha nguvu kubwa mwezi Januari 2025, huku thamani ya soko (market capitalisation) ikiongezeka kwa asilimia 12 ikilinganishwa na mwaka uliopita.',
                'content' => '<p>Soko la Hisa la Dar es Salaam (DSE) limeanza mwaka 2025 kwa nguvu, huku thamani ya jumla ya soko ikifikia shilingi trilioni 18.5, ikionyesha ukuaji wa asilimia 12 ikilinganishwa na kipindi kama hicho mwaka 2024.</p><p>Hisa za CRDB Bank, Tanzania Breweries Limited (TBL) na NMB Bank zimekuwa kati ya hisa zilizofanya vizuri zaidi, huku wawekezaji wa kigeni wakiongeza hisa zao katika soko la Tanzania. Takwimu za DSE zinaonyesha kwamba wawekezaji wa kigeni walisimamia asilimia 38 ya biashara zote za hisa mwezi Januari.</p><p>Mkurugenzi Mtendaji wa DSE, Moremi Marwa, alisema kwamba soko linaendelea kuimarika na kwamba DSE inaandaa maboresho ya mfumo wa kidigitali ili kurahisisha ununuzi na uuzaji wa hisa kwa Watanzania wote bila kujali eneo wanapoishi.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(6),
            ],

            // ============ JIOPOLITIKI ============
            [
                'category' => 'jiopolitiki',
                'title' => 'Mkutano wa EAC Nairobi: Viongozi wa Afrika Mashariki Wakubaliana Hatua za Amani DRC',
                'excerpt' => 'Wakuu wa nchi wa Jumuiya ya Afrika Mashariki (EAC) wamekutana Nairobi kujadili hali ya usalama DRC, na kukubaliana kuimarisha nguvu za jeshi la pamoja la kulinda amani.',
                'content' => '<p>Nairobi — Wakuu wa nchi wa Jumuiya ya Afrika Mashariki (EAC) walikutana jana katika mkutano wa dharura Nairobi, Kenya, kujadili hali mbaya ya usalama inayoendelea kaskazini mashariki mwa Jamhuri ya Kidemokrasia ya Kongo (DRC). Mkutano huo ulifanyika katikati ya wasiwasi mkubwa kuhusu makundi ya wapiganaji yanayosababisha msukosuko katika mkoa wa Kivu Kaskazini.</p><p>Rais Samia Suluhu Hassan wa Tanzania, ambaye ni Mwenyekiti wa sasa wa EAC, aliongoza mkutano huo pamoja na marais wa Kenya, Uganda, Rwanda, Burundi na DRC. Mkutano uliafiki kutuma nguvu zaidi za jeshi la pamoja la EAC (EACRF) na kutoa msaada wa kibinadamu kwa wakimbizi.</p><p>Tanzania inacheza jukumu muhimu katika juhudi za amani za DRC, ikiwa ni mwenyeji wa mazungumzo ya Nairobi na pia ikichangia askari zaidi ya 1,000 katika jeshi la pamoja la EAC.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(7),
            ],
            [
                'category' => 'siasa-tanzania',
                'title' => 'Rais Samia Atangaza Mpango Mkubwa wa Ujenzi wa Hospitali 200 Mikoani Tanzania',
                'excerpt' => 'Rais Samia Suluhu Hassan ametangaza mpango wa serikali wa kujenga hospitali 200 katika mikoa yote Tanzania ifikapo mwaka 2030, ukilenga kupunguza mzigo wa matibabu kwa wananchi.',
                'content' => '<p>Dodoma — Rais Samia Suluhu Hassan amefanya tangazo kubwa la mpango wa serikali wa kujenga hospitali 200 za kisasa katika mikoa yote ya Tanzania, katika hotuba ya ufunguzi wa bunge jipya la Tanzania. Mpango huu, unaojulikana kama "Afya Kwa Wote 2030", unatengewa shilingi trilioni 3.2 na utekelezaji utaanza mwaka 2025.</p><p>Mpango huu unalenga kupunguza msongamano katika hospitali za rufaa kama Muhimbili National Hospital (MNH) na Bugando, ambazo zimekuwa zikihudumia wagonjwa wengi zaidi ya uwezo wake. Kila hospitali mpya itakuwa na vitanda 100 vya kulaza wagonjwa, chumba cha upasuaji na kitengo cha uzazi.</p><p>"Tunataka kila Mtanzania awe na hospitali ndani ya umbali wa kilomita 10 kutoka makwake," alisema Rais Samia, akisifiwa na sauti za shangwe kutoka kwa wabunge.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(8),
            ],

            // ============ MASOKO ============
            [
                'category' => 'masoko',
                'title' => 'Bei ya Mahindi Yapanda Kariakoo: Mvua Kidogo Kaskazini Inasababisha Wasiwasi',
                'excerpt' => 'Bei ya mahindi imeendelea kupanda sokoni Kariakoo, ikiwa bei ya kilo moja imefikia shilingi 900, ikisukumwa na mvua kidogo iliyonyesha kaskazini mwa Tanzania msimu huu.',
                'content' => '<p>Dar es Salaam — Bei ya mahindi sokoni Kariakoo na Tandale imeendelea kupanda kwa wiki ya tatu mfululizo, huku bei ya kilo moja ikiwa kati ya shilingi 750 na 900, ikilinganishwa na shilingi 550 mwezi Januari 2025. Wataalamu wanasema kupanda huku kunasababishwa zaidi na mvua kidogo iliyoathiri mavuno kaskazini mwa Tanzania, hasa maeneo ya Kilimanjaro, Arusha na Manyara.</p><p>Mkulima Rashidi Kimaro kutoka Moshi alisema: "Mvua ya msimu huu ilichelewa na haikuwa ya kutosha. Mavuno yetu yameshuka kwa karibu asilimia 40. Bei za mazao zinapanda lakini si kwa sababu sisi wakulima tunapata faida zaidi — ni kwa sababu chakula kipo kidogo."</p><p>Ofisi ya Chakula na Dawa (TFDA) na Wizara ya Kilimo wametoa taarifa kwamba hifadhi za taifa za chakula (strategic food reserve) zina akiba ya kutosha kulisha taifa kwa miezi sita, na kwamba serikali itachukua hatua ikiwa hali ya bei itaendelea kupanda.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(9),
            ],
            [
                'category' => 'fedha-za-kigeni',
                'title' => 'Shilingi ya Tanzania Yaendelea Kudhoofika Dhidi ya Dola: Wasiwasi wa Waagizaji',
                'excerpt' => 'Shilingi ya Tanzania imeshuka hadi zaidi ya shilingi 2,560 kwa dola moja ya Marekani, ikiathiri waagizaji wa bidhaa ambao sasa wanalazimika kulipia zaidi kwa bidhaa za nje.',
                'content' => '<p>Dar es Salaam — Shilingi ya Tanzania (TZS) imeendelea kudhoofika dhidi ya dola ya Marekani (USD), ikiwa inabadilishwa kwa shilingi 2,555 hadi 2,575 kwa dola moja kulingana na viwango vya benki za biashara. Hali hii inasababisha wasiwasi mkubwa kwa waagizaji wa bidhaa nchini Tanzania.</p><p>Benki Kuu ya Tanzania (BOT) inasema kudhoofika kwa shilingi kunasababishwa na nakisi ya biashara ya nje (trade deficit), ambapo thamani ya bidhaa zinazoingizwa nchini inazidi ile ya bidhaa zinazouzwa nje. Tanzania ina nakisi ya biashara ya takriban dola bilioni 4 kwa mwaka.</p><p>Kwa upande mzuri, mauzo ya nje ya mazao kama kahawa, chai, pamba na korosho yamepanda kwa asilimia 15 mwaka huu, yanayochangia kupunguza athari za kupoteza thamani kwa shilingi.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(10),
            ],

            // ============ TEKNOLOJIA ============
            [
                'category' => 'teknolojia',
                'title' => 'M-Pesa Tanzania Yavuka Watumizi Milioni 20: Mapinduzi ya Fedha za Kidijitali',
                'excerpt' => 'Vodacom Tanzania imetangaza kwamba huduma ya M-Pesa imevuka watumizi milioni 20 Tanzania, ikifanya Tanzania kuwa mojawapo ya nchi zinazoongoza Afrika katika matumizi ya fedha za simu.',
                'content' => '<p>Dar es Salaam — Vodacom Tanzania imetangaza hatua ya kihistoria ya M-Pesa: huduma hiyo ya fedha za simu sasa ina watumizi wa kudumu zaidi ya milioni 20 Tanzania, ikifanya nchi yetu kuwa mojawapo ya nchi zinazoongoza barani Afrika katika ukuaji wa fedha za kidijitali (mobile money).</p><p>Takwimu zinaonyesha kwamba Watanzania wanahamisha shilingi trilioni zaidi ya 9 kwa mwezi kupitia huduma za M-Pesa, Tigo Pesa, Airtel Money na huduma nyingine za fedha za simu. Hii ni sawa na zaidi ya mara tatu ya bajeti ya serikali kwa sekta ya afya.</p><p>Mkurugenzi Mtendaji wa Vodacom Tanzania, Hisham Hendi, alisema: "M-Pesa imebadilisha maisha ya Watanzania. Mkulima wa kijijini anaweza kupokea malipo ya mazao yake moja kwa moja kwenye simu yake, na kununua bidhaa bila kuhitaji benki."</p><p>Wizara ya Mawasiliano inatarajiwa kutangaza sera mpya ya fedha za kidijitali mnamo Aprili 2025, inayolenga kulinda watumiaji na kukuza ubunifu katika sekta hii inayokua kwa kasi.</p>',
                'is_featured' => true,
                'published_at' => Carbon::now()->subDays(11),
            ],
            [
                'category' => 'startups-tanzania',
                'title' => 'Startup ya Kilimo-Tech Nala Foods Yapata Uwekezaji wa Dola Milioni 2 kutoka Kimataifa',
                'excerpt' => 'Nala Foods, startup ya Tanzania inayotumia teknolojia kuboresha mnyororo wa usambazaji wa chakula, imepata uwekezaji wa dola milioni 2 kutoka mfuko wa uwekezaji wa Afrika.',
                'content' => '<p>Dar es Salaam — Nala Foods, kampuni ya teknolojia ya kilimo (agri-tech) iliyoanzishwa na wajasiriamali wa Tanzania, imefanikiwa kupata uwekezaji wa dola milioni 2 (shilingi bilioni 5.1) kutoka mfuko wa uwekezaji wa Quona Capital unaofanya kazi katika nchi zinazoendelea.</p><p>Nala Foods inaunganisha wakulima wadogo moja kwa moja na masoko ya mjini kupitia programu ya simu, ikisaidia wakulima kupata bei bora kwa mazao yao na pia kupata masoko ya uhakika. Kampuni sasa inafanya kazi na zaidi ya wakulima 15,000 katika mikoa ya Morogoro, Iringa na Dodoma.</p><p>Mwanzilishi na Mkurugenzi Mtendaji, Amina Kessy, alisema: "Tumeona tatizo kubwa sana: wakulima wanauza mazao bei ndogo kwa sababu hawajui bei ya soko, na wanunuzi wa mjini wanalipa bei ghali kwa sababu kuna wasuluhishi wengi sana katikati. Sisi tunaondoa wasuluhishi hao."</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(12),
            ],
            [
                'category' => 'akili-bandia',
                'title' => 'Tanzania Yatangaza Sera ya Kwanza ya Akili Bandia (AI) Barani Afrika',
                'excerpt' => 'Serikali ya Tanzania imetangaza sera ya kitaifa ya Akili Bandia (AI), ikifanya Tanzania kuwa mojawapo ya nchi za kwanza za Afrika kuwa na mwongozo rasmi wa matumizi ya teknolojia hii.',
                'content' => '<p>Dodoma — Tanzania imepiga hatua ya kihistoria katika teknolojia kwa kutangaza Sera ya Kitaifa ya Akili Bandia (National AI Policy), ikifanya nchi yetu kuwa moja ya nchi chache za Afrika Kusini mwa Sahara kuwa na mwongozo rasmi wa matumizi ya teknolojia hii inayobadilisha dunia.</p><p>Waziri wa Mawasiliano na Teknolojia, Nape Nnauye, alisema sera hii itasaidia Tanzania kufaidika na uwezo wa Akili Bandia katika sekta za afya, kilimo, elimu na serikali bila kulazimika kufuata kila kitu kilichoundwa na nchi za nje. "Tunataka AI ya Tanzania kwa wananchi wa Tanzania," alisema Waziri Nnauye.</p><p>Sera inazingatia maadili ya matumizi ya AI, ulinzi wa data za kibinafsi, na jinsi ya kuhakikisha kwamba teknolojia hii inawasaidia hasa Watanzania wa vijijini ambao wanaweza kufaidika nazo katika kilimo na afya.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(13),
            ],

            // ============ KILIMO ============
            [
                'category' => 'kilimo',
                'title' => 'Msimu wa Kilimo 2024/25: Mvua za Mapema Zinabua Matumaini kwa Wakulima Kusini mwa Tanzania',
                'excerpt' => 'Wakulima wa mkoa wa Iringa, Njombe na Mbeya wanapumua pumzi ya starehe baada ya mvua nzuri za mapema kuanza kunyesha, huku matumaini makubwa yakiwa ya mavuno mazuri msimu huu.',
                'content' => '<p>Iringa — Msimu mpya wa kilimo wa 2024/25 umeanza vizuri kwa wakulima wa mikoa ya Kusini na Nyanda za Juu Kusini, ambapo mvua nzuri za mapema zimesababisha hali nzuri za kupanda mbegu. Hali hii inakwenda kinyume na kaskazini mwa Tanzania ambapo mvua zimechelewa na kuathiri mazao.</p><p>Faustina Mwakipesile, mkulima wa mahindi kutoka Mufindi, Iringa, alisema: "Mwaka huu mvua zimeanza mapema na zinanisaidia sana. Nimepanda heka tano za mahindi na ninatarajia mavuno mazuri." Hali kama hiyo inaonekana kwa wakulima wa mikoa ya Njombe na Mbeya.</p><p>Ofisi ya Makao Makuu ya Kilimo (MTC) inasema kwamba msimu huu inatarajiwa kuwa mzuri zaidi katika sehemu za nchi hizi, jambo ambalo linaweza kusaidia kupunguza upungufu wa chakula unaonekana kaskazini mwa nchi.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(14),
            ],

            // ============ MAWASILIANO ============
            [
                'category' => 'mawasiliano',
                'title' => 'TCRA Yatoa Leseni Mpya za 5G Tanzania: Vodacom na Airtel Wataanza Kujenga Miundombinu',
                'excerpt' => 'Mamlaka ya Mawasiliano Tanzania (TCRA) imetoa leseni za 5G kwa Vodacom na Airtel Tanzania, ikiashiria mwanzo mpya wa kizazi kipya cha mtandao wa simu nchini.',
                'content' => '<p>Dar es Salaam — Tanzania imepiga hatua kubwa ya kidijitali baada ya Mamlaka ya Mawasiliano Tanzania (TCRA) kutoa rasmi leseni za kuendesha mtandao wa 5G kwa makampuni mawili ya simu yanayoongoza: Vodacom Tanzania Plc na Airtel Tanzania Plc.</p><p>Mkurugenzi Mkuu wa TCRA, Jabir Idrisa, alieleza kwamba leseni hizi ni hatua ya kwanza katika safari ya Tanzania kuingia katika enzi ya 5G. Makampuni yatapewa miaka mitatu kujenga miundombinu ya 5G, kuanzia Dar es Salaam, Arusha na Mwanza.</p><p>Wataalam wa teknolojia wanasema kwamba 5G itabadilisha kabisa jinsi Watanzania wanavyotumia intaneti, hasa katika sekta za afya (dawa za mbali), kilimo (sensors za shambani) na elimu (masomo ya mbali). Inatarajiwa kwamba 5G itapatikana katika miji kumi mikubwa ya Tanzania ifikapo mwaka 2027.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(15),
            ],

            // ============ NISHATI ============
            [
                'category' => 'nishati',
                'title' => 'Mradi wa Gesi ya LNG Tanzania: Mazungumzo na Total Energies Yanaendelea Paris',
                'excerpt' => 'Timu ya mazungumzo ya Tanzania inazungumza na Total Energies Paris kuhusu mradi mkubwa wa LNG wa dola bilioni 30 ambao unatarajiwa kukifanya Tanzania kuwa mzalishaji mkubwa wa gesi barani Afrika.',
                'content' => '<p>Dar es Salaam/Paris — Mazungumzo kati ya Serikali ya Tanzania na kampuni za kimataifa za gesi asili, hasa Total Energies ya Ufaransa, yanaendelea Paris kujadili masharti ya mwisho ya mradi mkubwa wa LNG (Liquefied Natural Gas) wa dola bilioni 30. Mradi huu, ukikamilika, utafanya Tanzania kuwa moja ya nchi kuu za kuuza LNG duniani.</p><p>Tanzania ina hifadhi za gesi asili zaidi ya futi za ujazo trilioni 57 (57 Tcf) katika maeneo ya bahari ya Hindi, hasa katika kina kirefu cha bahari (deep offshore). Mradi wa LNG umekuwa ukisubiriwa kwa miaka zaidi ya kumi, huku mazungumzo yakiathiriwa na mabadiliko ya bei za gesi duniani na changamoto za kitaifa.</p><p>Waziri wa Nishati, January Makamba, alisema: "Tunaendelea kupigana kwa ajili ya masharti bora kwa Tanzania. Hatutakubali haraka haraka kama utafiti wa madini yetu hauwapi Watanzania faida ya kweli." Inatarajiwa kwamba makubaliano ya mwisho yanaweza kupatikana ifikapo mwaka 2026.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(16),
            ],

            // ============ UWEKEZAJI ============
            [
                'category' => 'uwekezaji',
                'title' => 'EPZA Tanzania Yavutia Uwekezaji wa Dola Milioni 800 Mwaka 2024: Rekodi Mpya',
                'excerpt' => 'Mamlaka ya Maeneo Maalumu ya Uwekezaji Tanzania (EPZA) imevutia uwekezaji wa jumla ya dola milioni 800 mwaka 2024, rekodi mpya tangu kuanzishwa kwake mwaka 2006.',
                'content' => '<p>Dar es Salaam — Mamlaka ya Maeneo Maalumu ya Uwekezaji Tanzania (EPZA) imetangaza kwamba mwaka 2024 ilivutia uwekezaji wa jumla ya dola za Marekani milioni 800, kiwango kikubwa zaidi tangu kuanzishwa kwake. Wawekezaji wakubwa wanatoka China, India, UAE na nchi za Ulaya.</p><p>Miradi inayochangia zaidi ni katika sekta za viwanda vya nguo, kusindika chakula, usindikaji wa korosho na viwanda vya plastiki. Maeneo ya EPZA ya Ubungo (Dar es Salaam), Mtwara na Kigoma yanaendelea kukua haraka.</p><p>Mkurugenzi Mtendaji wa EPZA, Dkt. John Kaseya, alisema: "Wazungumzaji zaidi ya 50 wa biashara kutoka nchi 15 wametembelea maeneo yetu mwaka huu. Tanzania inaonekana kama mahali salama na pa kuvutia kuwekeza."</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(17),
            ],

            // ============ MORE BIASHARA ============
            [
                'category' => 'biashara',
                'title' => 'Bandari ya Dar es Salaam Yafanikiwa Kushughulikia Makontena Milioni 1.2 mwaka 2024',
                'excerpt' => 'Tanzania Ports Authority imetangaza kwamba Bandari ya Dar es Salaam ilishughulikia makontena (TEU) milioni 1.2 mwaka 2024, ongezeko la asilimia 22 ikilinganishwa na mwaka uliopita.',
                'content' => '<p>Dar es Salaam — Tanzania Ports Authority (TPA) imetangaza matokeo mazuri ya mwaka 2024 ambapo Bandari ya Dar es Salaam ilishughulikia makontena zaidi ya milioni 1.2, rekodi mpya katika historia ya bandari hiyo. Ongezeko hili la asilimia 22 linaashiria nguvu ya biashara ya nje ya Tanzania na nchi za jirani.</p><p>Bandari ya Dar es Salaam ni lango kuu la biashara kwa nchi zinazoizunguka Tanzania kama DRC, Zambia, Malawi, Rwanda na Burundi. Mkurugenzi Mkuu wa TPA, Dkt. Plasduce Mbossa, alisema kwamba uboreshaji wa miundombinu, ikiwa ni pamoja na ununuzi wa crane mpya na upanuzi wa gati, umechangia pakubwa ukuaji huu.</p><p>Serikali imetenga shilingi trilioni 1.8 kwa ujenzi wa gati mpya tatu ambazo zinatarajiwa kukamilika ifikapo mwaka 2027. Hii itaongeza uwezo wa bandari hadi makontena milioni 2.5 kwa mwaka.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(18),
            ],
            [
                'category' => 'biashara',
                'title' => 'Azam TV Yatangaza Upanuzi: Vituo 50 Vipya Barani Afrika vya Maudhui ya Kiswahili',
                'excerpt' => 'Kampuni ya Azam TV ya Tanzania imetangaza mpango wa upanuzi mkubwa wa kufikia nchi 12 za Afrika kwa kutumia maudhui ya lugha ya Kiswahili.',
                'content' => '<p>Dar es Salaam — Azam Media, mojawapo ya makampuni makubwa ya televisheni ya Tanzania, imetangaza mpango wa kupanua huduma zake katika nchi 12 za Afrika, hasa nchi zinazotumia Kiswahili kama lugha ya pili. Kampuni inalenga kufikia watazamaji zaidi ya milioni 50 nje ya Tanzania ifikapo mwaka 2027.</p><p>Mkurugenzi Mtendaji wa Azam Media, Said Salim Bakhresa Jr., alisema: "Tanzania ina nguvu ya kweli katika tasnia ya media ya Kiswahili. Hadithi zetu ni za kweli, na tunaamini Kiswahili ni lugha ya mustakabali wa Afrika."</p><p>Mpango huu unajumuisha vituo 50 vipya vya maudhui (content hubs) katika nchi kama Kenya, Uganda, Rwanda, Ethiopia, na Msumbiji. Uwekezaji wa awali ni dola milioni 120.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(19),
            ],
            [
                'category' => 'biashara',
                'title' => 'Wajasiriamali Wadogo Arusha Wapata Mkopo wa Shilingi Bilioni 2 kutoka SIDO',
                'excerpt' => 'Shirika la Maendeleo ya Wajasiriamali Wadogo (SIDO) limetoa mikopo ya shilingi bilioni 2 kwa vikundi 340 vya wajasiriamali wadogo mkoa wa Arusha ili kukuza biashara zao.',
                'content' => '<p>Arusha — Shirika la Maendeleo ya Wajasiriamali Wadogo (SIDO) limetoa mikopo yenye thamani ya shilingi bilioni 2 kwa vikundi 340 vya wajasiriamali wadogo katika mkoa wa Arusha. Mikopo hii, yenye riba ya chini ya asilimia 8, inalenga wajasiriamali wa nguo, chakula, sanaa na biashara ndogo ndogo za uuzaji wa bidhaa.</p><p>Maria Kimaro, mwenyekiti wa kikundi cha wanawake wa kushona Arusha, alisema: "Mkopo huu utatusaidia kununua mashine mpya za kushona na kuajiri vijana zaidi. Tulikuwa tukifanya kwa mikono tu, sasa tutakuwa na teknolojia." Kikundi chake cha wanawake 22 kimepata mkopo wa shilingi milioni 45.</p><p>SIDO ina mpango wa kutoa mikopo ya jumla ya shilingi bilioni 20 kwa wajasiriamali nchini kote ifikapo mwisho wa mwaka 2025, ikilenga hasa vijana na wanawake.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(20),
            ],
            [
                'category' => 'biashara',
                'title' => 'Soko la Kariakoo Lafanyiwa Upya: Muundo Mpya wa Kisasa Ufike 2027',
                'excerpt' => 'Halmashauri ya Jiji la Dar es Salaam imetangaza mpango wa kufanyia upya Soko la Kariakoo kwa ujenzi wa jengo la ghorofa 10 lenye duka zaidi ya 3,000 za kisasa.',
                'content' => '<p>Dar es Salaam — Halmashauri ya Jiji la Dar es Salaam imetangaza mpango mkubwa wa kufanyia upya Soko la Kariakoo, mojawapo ya masoko makubwa zaidi Afrika Mashariki. Mradi huu, wenye thamani ya shilingi trilioni 1.2, unalenga kujenga jengo la ghorofa 10 lenye duka zaidi ya 3,000, maegesho ya magari, na mfumo wa kisasa wa umeme na maji.</p><p>Wafanyabiashara wa Kariakoo wamekuwa wakiitaka serikali kuboresha miundombinu ya soko hilo kwa miaka mingi, wakisema hali duni ya miundombinu imekuwa inaathiri biashara zao. Soko la Kariakoo linahudumia watu zaidi ya 100,000 kila siku.</p><p>Mradi utaanza mwaka 2025 na unatarajiwa kukamilika ifikapo 2027. Wafanyabiashara watapewa maeneo mbadala wakati wa ujenzi.</p>',
                'is_featured' => true,
                'published_at' => Carbon::now()->subDays(21),
            ],
            [
                'category' => 'kampuni-kubwa',
                'title' => 'NMB Bank Yafungua Matawi 30 Mapya Vijijini: Lengo la Benki kwa Kila Kijiji',
                'excerpt' => 'NMB Bank Plc imefungua matawi 30 mapya katika maeneo ya vijijini Tanzania, ikiwa sehemu ya mkakati wa kampuni wa kufikia wananchi wasio na akaunti ya benki.',
                'content' => '<p>Dar es Salaam — NMB Bank Plc, mojawapo wa benki zinazoongoza Tanzania, imefungua matawi 30 mapya katika maeneo ya vijijini na miji midogo ya Tanzania. Hatua hii inalenga kukuza ufikiaji wa huduma za benki kwa Watanzania wanaoishi mbali na miji mikubwa.</p><p>Mkurugenzi Mtendaji wa NMB Bank, Ruth Zaipuna, alisema: "Bado kuna Watanzania wengi hawana akaunti ya benki. Sisi tunaona hilo kama fursa ya biashara na pia wajibu wa kijamii. Benki kwa kila Mtanzania ndio lengo letu." Matawi mapya yanapatikana katika mikoa ya Dodoma, Singida, Tabora, Kigoma, Lindi na Mtwara.</p><p>Akaunti mpya za NMB MKombozi (kwa wananchi wa kipato kidogo) sasa zinapatikana bila ada ya mwanzo na huhitaji salio la chini.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(22),
            ],
            [
                'category' => 'biashara',
                'title' => 'Google Yatangaza Ofisi ya Kwanza Dar es Salaam — Ajira 50 Zinapatikana',
                'excerpt' => 'Kampuni ya kimataifa ya teknolojia ya Google imetangaza kufungua ofisi rasmi ya kwanza Dar es Salaam, Tanzania, ikitarajiwa kuchangia ukuaji wa sekta ya teknolojia nchini.',
                'content' => '<p>Dar es Salaam — Google LLC imetangaza kufungua ofisi rasmi katika Dar es Salaam, Tanzania, hatua ambayo inaashiria imani ya wawekezaji wa kimataifa katika uchumi wa kidijitali wa Tanzania. Ofisi hii, itakayokuwa katika jengo la kisasa la Posta House, itaanza kufanya kazi Aprili 2025 na kuajiri wafanyakazi 50 wa Tanzania awali.</p><p>Msimamizi wa Google Afrika, Nitin Gajria, alisema: "Tanzania ina moja ya mifumo ya simu inayokua kwa kasi zaidi Afrika. Watanzania ni wabunifu, wanaopenda teknolojia, na sisi tuko tayari kufanya kazi nao kuunda maudhui ya Kiswahili na bidhaa za kidijitali kwa Afrika Mashariki."</p><p>Ajira 50 za awali zinajumuisha nafasi za uhandisi wa programu, masoko ya kidijitali, usimamizi wa washirika wa biashara, na maudhui ya lugha ya Kiswahili. Wasomi wa Tanzania wanashauriwa kuomba kazi kupitia tovuti ya Google Careers.</p>',
                'is_featured' => true,
                'published_at' => Carbon::now()->subDays(23),
            ],
            [
                'category' => 'biashara',
                'title' => 'Kiwanda Kikubwa cha Korosho Mtwara Kinaanza Uzalishaji — Wakulima 40,000 Wanufaika',
                'excerpt' => 'Kiwanda kipya cha kusindika korosho chenye uwezo wa tani 30,000 kwa mwaka kimezinduliwa Mtwara, kikiwaletea wakulima wa korosho bei bora na soko la uhakika.',
                'content' => '<p>Mtwara — Kiwanda kipya cha kisasa cha kusindika korosho, chenye thamani ya dola milioni 35, kimezinduliwa rasmi mkoa wa Mtwara. Kiwanda hiki, kilichojengwa kwa uwekezaji wa pamoja wa serikali ya Tanzania na kampuni ya India ya Olam International, kina uwezo wa kusindika tani 30,000 za korosho kwa mwaka na kitaleta faida moja kwa moja kwa wakulima zaidi ya 40,000 wa korosho mkoa wa Mtwara na Lindi.</p><p>Rais Samia Suluhu Hassan alihudhuria uzinduzi huo na kusema: "Badala ya kuuza korosho ghafi, Tanzania sasa itauza korosho iliyosindikwa na kuongeza thamani. Hii ndiyo njia ya kweli ya utajiri."</p><p>Kabla ya kiwanda hiki, Tanzania iliuza asilimia 80 ya korosho yake bila kusindika, ikipoteza faida kubwa ya ziada. Kiwanda kipya kitawezesha Tanzania kupata bei ya mara tatu zaidi kwa kila kilo ya korosho.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(24),
            ],
            [
                'category' => 'hisa-dse',
                'title' => 'CRDB na NMB Waingie Ushirikiano wa Huduma za Fedha — Hisa Zapanda DSE',
                'excerpt' => 'CRDB Bank na NMB Bank wametangaza ushirikiano wa kiufundi katika huduma za malipo ya kidijitali, na hisa za pande zote mbili zikapanda zaidi ya asilimia 5 soko la DSE.',
                'content' => '<p>Dar es Salaam — Katika hatua ya kuvutia biashara, CRDB Bank Plc na NMB Bank Plc wametangaza ushirikiano wa kiufundi katika sekta ya malipo ya kidijitali, hasa kubadilishana mifumo ya ATM na huduma za M-banking. Tangazo hili lilisababisha hisa za CRDB kupanda asilimia 5.3 na NMB asilimia 4.8 katika soko la DSE Jumatano.</p><p>Ushirikiano huu unamaanisha kwamba wateja wa CRDB wanaweza kutumia ATM za NMB bila ada ya ziada na kinyume chake. Hii itarahusu wateja milioni 8 wa pamoja kupata huduma bora zaidi nchini kote.</p><p>Wachambuzi wa masoko wanasema ushirikiano huu unaweza kuwa hatua ya kwanza kabla ya muungano mkubwa zaidi kati ya benki hizo mbili, ingawa viongozi wa pande zote wanakataa madai hayo kwa sasa.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(25),
            ],
            [
                'category' => 'biashara',
                'title' => 'Tanzania Yapata Hadhi ya "Investment Grade" kutoka Moody\'s — Hatua ya Kihistoria',
                'excerpt' => 'Shirika la tathmini la kimataifa la Moody\'s limetoa Tanzania hadhi ya uwekezaji (investment grade) kwa mara ya kwanza katika historia, hatua inayotarajiwa kuvutia uwekezaji mpya.',
                'content' => '<p>Dar es Salaam — Shirika la tathmini la kimataifa la Moody\'s Investors Service limetoa Tanzania hadhi ya uwekezaji (investment grade rating) kwa mara ya kwanza katika historia ya nchi hii. Hatua hii ya kihistoria inamaanisha kwamba wawekezaji wa kimataifa wanaweza sasa kuwekeza Tanzania kwa uhakika zaidi, hasa katika dhamana za serikali (government bonds).</p><p>Hadhi ya Ba1 iliyotolewa na Moody\'s inazingatia uthabiti wa kisiasa, ukuaji wa uchumi unaoendelea, udhibiti bora wa fedha za umma na maboresho ya mazingira ya biashara yaliyofanywa na serikali ya Rais Samia Suluhu Hassan.</p><p>Waziri wa Fedha Dkt. Mwigulu Nchemba alisema: "Hii ni uthibitisho kwamba Tanzania iko kwenye mwelekeo sahihi. Tutaendelea kuimarisha uchumi wetu kwa manufaa ya Watanzania wote."</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(26),
            ],
            [
                'category' => 'biashara',
                'title' => 'Tanzania-Kenya Free Trade: Biashara ya Mazao Sasa Haina Ushuru kati ya Nchi Mbili',
                'excerpt' => 'Tanzania na Kenya zimefuta ushuru kwenye biashara ya mazao ya kilimo kati ya nchi hizi mbili, hatua inayotarajiwa kusaidia wakulima wa pande zote kufaidika na masoko makubwa.',
                'content' => '<p>Nairobi/Dar es Salaam — Serikali za Tanzania na Kenya zimesaini makubaliano ya kuondoa ushuru wa forodha kwenye bidhaa za kilimo zinazovuka mpaka kati ya nchi hizi mbili. Makubaliano haya yanaingia nguvu mara moja na yanatarajiwa kuleta faida kubwa kwa wakulima wa pande zote mbili.</p><p>Bidhaa zinazofaidika ni pamoja na mahindi, mchele, sukari, mboga, matunda, nyama, samaki na mazao mengine ya kilimo. Kabla ya makubaliano haya, ushuru ulikuwa unaweza kufikia asilimia 25, na kusababisha bei ghali kwa wananchi wa pande zote.</p><p>Wafanyabiashara wa mazao Namanga na Holili wanasema tayari biashara imeanza kuongezeka tangu tangazo la makubaliano haya. "Nairobi iko karibu. Sasa naweza kupeleka mboga zangu bila kujali ushuru," alisema mkulima kutoka Arusha.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(27),
            ],
            [
                'category' => 'biashara',
                'title' => 'TANESCO Yapitisha Mpango wa Kupunguza Matatizo ya Umeme: Mgawanyo Utaisha 2026',
                'excerpt' => 'TANESCO imetangaza mpango wa miaka miwili wa kumaliza tatizo la mgawanyo wa umeme Tanzania, ukijumuisha ujenzi wa mitambo mipya na matengenezo ya mistari ya umeme.',
                'content' => '<p>Dodoma — Kampuni ya Taifa ya Umeme (TANESCO) imetoa kauli inayotumainiwa na Watanzania wengi: tatizo la mgawanyo wa umeme (load shedding) litamalizika kabla ya mwaka 2026. Mpango mkakati mpya wa TANESCO unaojulikana kama "Umeme kwa Wote 2026" unajumuisha hatua kadhaa za haraka na za muda mrefu.</p><p>Hatua za haraka ni pamoja na ukarabati wa turbine 4 za TANESCO zilizosimama kwa miaka miwili, ununuzi wa umeme wa dharura kutoka Zambia na Msumbiji, na ufungaji wa jopo za jua (solar panels) katika maeneo ya vijijini.</p><p>Hatua za muda mrefu ni pamoja na mradi wa umeme wa mto wa Rusumo (maji, 80 MW) na mradi mpya wa gesi wa Somanga (210 MW). Uwekezaji wa jumla ni shilingi trilioni 4.8.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(28),
            ],

            // ============ MORE JIOPOLITIKI ============
            [
                'category' => 'jiopolitiki',
                'title' => 'Bunge la Tanzania Lapitisha Bajeti ya Shilingi Trilioni 49.3 kwa Mwaka 2025/26',
                'excerpt' => 'Bunge la Jamhuri ya Muungano wa Tanzania limepitisha bajeti ya shilingi trilioni 49.3 kwa mwaka wa fedha 2025/26, ikiwa bajeti kubwa zaidi katika historia ya Tanzania.',
                'content' => '<p>Dodoma — Bunge la Tanzania limepitisha bajeti ya shilingi trilioni 49.3 kwa mwaka wa fedha 2025/26, ikiwa rekodi mpya ya bajeti kubwa zaidi katika historia ya nchi. Bajeti hii, iliyowasilishwa na Waziri wa Fedha Dkt. Mwigulu Nchemba, inalenga sekta za kilimo (trilioni 4.2), elimu (trilioni 8.1), afya (trilioni 5.6), na ujenzi wa miundombinu ya barabara na reli (trilioni 12.3).</p><p>Upande wa mapato, serikali inatarajia kukusanya shilingi trilioni 33.8 kutoka kwa kodi mbalimbali, pamoja na mikopo ya ndani na ya nje ya shilingi trilioni 15.5. Mapato ya kodi yanatarajiwa kuongezeka baada ya TRA (Tanzania Revenue Authority) kuimarisha mifumo ya ukusanyaji wa kodi.</p><p>Wabunge wa upinzani waliendelea kulalamikia ukubwa wa deni la taifa, lakini serikali ilisema deni la Tanzania la asilimia 47 ya GDP bado liko ndani ya mipaka salama iliyowekwa na Shirika la Fedha la Kimataifa (IMF).</p>',
                'is_featured' => true,
                'published_at' => Carbon::now()->subDays(29),
            ],
            [
                'category' => 'eac-afrika-mashariki',
                'title' => 'Tanzania na Umoja wa Ulaya Wasaini Mkataba wa Kilimo cha Kisasa — Euro Milioni 180',
                'excerpt' => 'Tanzania na Umoja wa Ulaya wamesaini mkataba mkubwa wa msaada wa kilimo cha kisasa wa euro milioni 180, ukilenga kuboresha teknolojia ya kilimo na usalama wa chakula.',
                'content' => '<p>Dar es Salaam — Tanzania na Umoja wa Ulaya wamesaini Mkataba wa Msaada wa Kilimo (Agricultural Support Agreement) wenye thamani ya euro milioni 180 (shilingi bilioni 540), ukilenga kuimarisha kilimo cha kisasa na usalama wa chakula nchini Tanzania kwa kipindi cha miaka 5.</p><p>Mradi huu, unaojulikana kama "Tanzania Agricultural Transformation Programme" (TATP), utajumuisha upatikanaji wa teknolojia bora za kilimo kwa wakulima wadogo, ujenzi wa mifumo ya umwagiliaji, na mafunzo ya kisayansi kwa wakulima zaidi ya 500,000.</p><p>Balozi wa EU Tanzania, Manfredo Fanti, alisema: "Tunaamini kwamba Tanzania ina uwezo mkubwa wa kuwa ghala la chakula la Afrika. Msaada huu unaelekeza nguvu zetu katika sekta muhimu zaidi — kilimo cha wakulima wadogo."</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(30),
            ],
            [
                'category' => 'siasa-tanzania',
                'title' => 'Uchaguzi wa Serikali za Mitaa 2025: CCM Yashinda Kwa Kishindo — Upinzani Unabishana',
                'excerpt' => 'Chama Cha Mapinduzi (CCM) kimeshinda uchaguzi wa serikali za mitaa wa 2025 kwa ushindi mkubwa, huku vyama vya upinzani vikipinga matokeo hayo wakidai ulaghai.',
                'content' => '<p>Dodoma — Chama Cha Mapinduzi (CCM) kimeshinda asilimia 87 ya viti vya madiwani katika uchaguzi wa serikali za mitaa uliofanyika wiki iliyopita, kulingana na takwimu rasmi za Tume ya Uchaguzi (NEC). Upinzani, ukiongozwa na Chadema, unasimama imara kwenye madai kwamba uchaguzi haukuwa wa haki.</p><p>Msemaji wa NEC, Jesca Msambatwa, alisema kwamba uchaguzi ulifanywa kwa uwazi na uhalali na kwamba madai ya ulaghai hayana ushahidi wa kutosha. Uchaguzi ulipata ushiriki wa zaidi ya asilimia 65 ya wapiga kura wenye usajili.</p><p>Maoni ya kimataifa kutoka kwa wangalizi wa Umoja wa Mataifa yalisema uchaguzi ulifanywa kwa amani, ingawa yalibainisha maeneo kadhaa ya wasiwasi kuhusu uwazi wa mchakato.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(31),
            ],
            [
                'category' => 'habari-dunia',
                'title' => 'G7 Wamjumuisha Rais Samia katika Mkutano Mkubwa Japani — Afrika Mbele Zaidi',
                'excerpt' => 'Rais Samia Suluhu Hassan ameaaliwa katika mkutano wa kilele wa G7 uliofanyika Japan, akiwakilisha sauti ya Afrika katika majadiliano ya uchumi wa dunia na mabadiliko ya hali ya hewa.',
                'content' => '<p>Hiroshima, Japan — Rais Samia Suluhu Hassan wa Tanzania ameshiriki katika mkutano wa G7 uliofanyika Hiroshima, Japan, akiwa miongoni mwa viongozi wachache wa Afrika walioaaliwa na serikali ya Japan. Mkutano huu ulijadili masuala ya uchumi wa dunia, usalama wa chakula, mabadiliko ya hali ya hewa, na mizozo ya kimataifa.</p><p>Rais Samia alitoa hotuba yenye nguvu kuhusu hali ya mabadiliko ya hali ya hewa Afrika, akisema: "Afrika inabeba mzigo mkubwa wa mabadiliko ya hali ya hewa ambayo haikuyasababisha. Tunahitaji haki — ufadhili wa hali ya hewa unaotosheleza na teknolojia bora."</p><p>Hotuba ya Rais Samia ilipokea makofi ya nguvu na kuvutia tahadhari ya kimataifa. Japan ilitangaza kuongeza msaada wake wa hali ya hewa kwa Afrika hadi dola bilioni 4 ifikapo 2028.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(32),
            ],

            // ============ MORE UCHUMI ============
            [
                'category' => 'uchumi',
                'title' => 'IMF Yatoa Ripoti Nzuri ya Uchumi wa Tanzania — Ukuaji wa Asilimia 6.2 Unatarajiwa 2025',
                'excerpt' => 'Shirika la Fedha la Kimataifa (IMF) limetoa ripoti yenye matumaini kwa uchumi wa Tanzania, ukitabiri ukuaji wa asilimia 6.2 mwaka 2025 ukisaidiwa na utalii, madini na miundombinu.',
                'content' => '<p>Washington/Dar es Salaam — Shirika la Fedha la Kimataifa (IMF) limetoa ripoti ya nusu mwaka ya tathmini ya uchumi wa Tanzania (Article IV Consultation), ikitabiri ukuaji wa uchumi wa asilimia 6.2 kwa mwaka 2025. Ripoti hii inabainisha nguvu za uchumi wa Tanzania, ikiwa ni pamoja na sekta ya utalii inayopona vizuri, mauzo mazuri ya madini, na uwekezaji mkubwa katika miundombinu.</p><p>IMF inaishauri Tanzania kuendelea na mageuzi ya ukusanyaji kodi, kupunguza gharama za uendeshaji wa serikali, na kuwekeza zaidi katika elimu na afya kama nguzo za ukuaji endelevu. Mfumuko wa bei wa asilimia 4.1 unaonekana vizuri na unatarajiwa kushuka zaidi.</p><p>Ripoti inapongeza juhudi za Rais Samia Suluhu Hassan kuimarisha mazingira ya biashara, ikiwa ni pamoja na kupunguza urasimu na muda wa kupata leseni za biashara kutoka siku 30 hadi siku 10.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(33),
            ],
            [
                'category' => 'uchumi',
                'title' => 'Mkutano wa Wawekezaji Dar es Salaam: Miradi Mipya 23 ya Dola Bilioni 3.8 Yatangazwa',
                'excerpt' => 'Tanzania Investment Forum ya 2025 iliyofanyika Dar es Salaam ilishuhudia utangazaji wa miradi mipya 23 yenye thamani ya jumla ya dola bilioni 3.8 katika sekta mbalimbali.',
                'content' => '<p>Dar es Salaam — Tanzania Investment Forum (TIF) ya 2025 ilifanikiwa sana, ikiwa ni mkutano mkubwa zaidi wa uwekezaji kuwahi kufanyika Tanzania. Wawekezaji zaidi ya 1,200 kutoka nchi 45 walihudhuria mkutano huo uliofanyika Julius Nyerere International Convention Centre, na miradi mipya 23 yenye thamani ya jumla ya dola bilioni 3.8 ilitangazwa rasmi.</p><p>Sekta zilizovutia uwekezaji mkubwa zaidi ni madini (dola bilioni 1.2), ujenzi wa miundombinu (dola bilioni 0.9), kilimo na usindikaji wa chakula (dola milioni 650), utalii (dola milioni 480), na nishati mbadala (dola milioni 470).</p><p>Kiongozi wa TIC (Tanzania Investment Centre), Dkt. Gilead Teri, alisema: "Hii ni ushahidi kwamba Tanzania iko katika ramani ya uwekezaji wa kimataifa. Tunahitaji kutunza mazingira haya mazuri ya biashara."</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(34),
            ],
            [
                'category' => 'benki-na-fedha',
                'title' => 'Benki ya Standard Chartered Tanzania Yafungua Kitengo Kipya cha Msaada wa SME',
                'excerpt' => 'Standard Chartered Bank Tanzania imefungua kitengo maalumu cha msaada wa biashara ndogo na za kati (SME), ikitoa mikopo na mafunzo kwa wajasiriamali wanaoanza.',
                'content' => '<p>Dar es Salaam — Standard Chartered Bank Tanzania Ltd imetangaza uzinduzi wa kitengo kipya maalumu kinacholenga biashara ndogo na za kati (SME Unit), ambacho kitatoa huduma kamili za fedha, mafunzo ya biashara, na msaada wa usimamizi kwa wajasiriamali wadogo na wa kati Tanzania.</p><p>Kitengo kipya kitaanza kwa kutoa mikopo ya shilingi milioni 5 hadi bilioni 2 kwa biashara zinazotimiza vigezo, na riba ya asilimia 14-18 ambayo ni chini ya wastani wa soko. Mkopo utaambatana na mafunzo ya bure ya biashara, uhasibu, na masoko.</p><p>Mkurugenzi Mtendaji wa Standard Chartered Tanzania, Sanjay Rughani, alisema: "SME ndiyo uti wa mgongo wa uchumi wa Tanzania. Sisi tunataka kuwa washirika wa kweli wa ukuaji wao, si tu benki inayotoa mkopo na kuondoka."</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(35),
            ],

            // ============ MORE MASOKO ============
            [
                'category' => 'masoko',
                'title' => 'Bei ya Mahindi Yazidi Kupanda: Wasiwasi wa Usalama wa Chakula Kaskazini Tanzania',
                'excerpt' => 'Bei ya mahindi imefikia shilingi 1,100 kwa kilo sehemu za kaskazini mwa Tanzania, ikisababisha wasiwasi wa usalama wa chakula kwa familia za kipato cha chini.',
                'content' => '<p>Arusha — Bei ya mahindi sokoni kaskazini mwa Tanzania imeendelea kupanda, ikifikia shilingi 1,100 hadi 1,300 kwa kilo katika masoko ya Arusha, Moshi na Kilimanjaro — bei ya juu zaidi katika historia ya miaka mitano. Hali hii inasababisha wasiwasi mkubwa wa usalama wa chakula hasa kwa familia za kipato cha chini.</p><p>Sababu kuu za upandaji huu ni pamoja na mvua chache msimu uliopita, ongezeko la mahitaji kutoka DRC na nchi nyingine za jirani, na gharama kubwa za usafirishaji. Wakulima wa Arumeru na Hai wanasema hata wenyewe wananunua mahindi sokoni kwa sababu mavuno yao hayakutosha.</p><p>Serikali kupitia Bodi ya Mazao Mchanganyiko (WRS) imesema itaingilia soko kwa kutoa hifadhi ya chakula ikiwa bei itaendelea kupanda. Hifadhi ya taifa ya chakula (SGR) ina gunia milioni 1.8 za mahindi kulingana na takwimu za hivi punde.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(36),
            ],
            [
                'category' => 'fedha-za-kigeni',
                'title' => 'Soko la Dhahabu Lapanda Dunia: Tanzania Yapata Faida ya Ziada ya Dola Milioni 200',
                'excerpt' => 'Bei ya dhahabu duniani imefika rekodi mpya ya dola 2,450 kwa wakia, na Tanzania — mzalishaji mkubwa wa tatu Afrika — inafaidika kupitia ongezeko la mapato ya mauzo ya madini.',
                'content' => '<p>Dar es Salaam/New York — Bei ya dhahabu katika soko la kimataifa imefika kiwango kipya cha rekodi cha dola 2,450 kwa wakia (troy ounce), ikisukumwa na mfumuko wa bei duniani, wasiwasi wa geopolitics, na mahitaji makubwa ya benki kuu za nchi nyingi kujaza akiba zao za dhahabu. Tanzania, inayoshika nafasi ya tatu kwa uzalishaji wa dhahabu barani Afrika, inafaidika kwa kiasi kikubwa na mapanda haya ya bei.</p><p>Kampuni za madini zinazo fanya kazi Tanzania kama Barrick Gold (mgodi wa Bulyanhulu na Buzwagi), AngloGold Ashanti (Geita Gold Mine), na Acacia Mining zinatarajiwa kuripoti faida kubwa zaidi mwaka 2025 kutokana na kupanda huku kwa bei.</p><p>Wizara ya Madini inakadiri kwamba Tanzania itapokea mapato ya ziada ya dola milioni 200 kutoka kwa kodi za madini na mrabaha (royalties) ikiwa bei ya dhahabu itabaki juu ya dola 2,000 mwaka wote wa 2025.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(37),
            ],
            [
                'category' => 'masoko',
                'title' => 'Bei za Mafuta ya Gari Zashuka Tanzania: EWURA Yatangaza Punguzo la Shilingi 150 kwa Lita',
                'excerpt' => 'Mamlaka ya Udhibiti wa Huduma za Nishati na Maji (EWURA) imetangaza punguzo la bei za mafuta ya petroli na dizeli kwa shilingi 150 kwa lita, hatua inayotarajiwa kupunguza gharama za usafirishaji.',
                'content' => '<p>Dar es Salaam — Mamlaka ya Udhibiti wa Huduma za Nishati na Maji (EWURA) imetangaza punguzo la bei za mafuta ya petroli na dizeli kuanzia Aprili 1, 2025. Bei mpya ya petroli itakuwa shilingi 2,750 kwa lita (kutoka shilingi 2,900), na dizeli shilingi 2,550 (kutoka shilingi 2,700).</p><p>Punguzo hili linasababishwa na kushuka kwa bei ya mafuta ghafi (crude oil) duniani, kutoka dola 88 hadi dola 79 kwa pipa, pamoja na kuimarika kidogo kwa shilingi ya Tanzania dhidi ya dola. EWURA inasema bei mpya zinaanza kutumika Aprili 1 na zitafanyiwa mapitio tena mwezi Mei.</p><p>Wenye magari, makampuni ya usafirishaji na wafanyabiashara wanasherehekea habari hii, wakisema muda mfupi punguzo hili litashusha bei za bidhaa mbalimbali sokoni.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(38),
            ],

            // ============ MORE TEKNOLOJIA ============
            [
                'category' => 'teknolojia',
                'title' => 'Simu ya Kwanza ya Android Iliyotengenezwa Tanzania: Mfumo wa Jamii Unauzwa Sh 450,000',
                'excerpt' => 'Kampuni ya teknolojia ya vijana wa Tanzania "JuaCode Tech" imetangaza simu ya kwanza ya Android iliyoundwa Tanzania, yenye bei ya shilingi 450,000 na maudhui ya Kiswahili.',
                'content' => '<p>Dar es Salaam — Katika hatua ya kuvutia sana, kampuni ya teknolojia ya vijana wa Tanzania inayoitwa "JuaCode Tech" imetangaza uzinduzi wa simu yake ya kwanza ya Android iliyotengenezwa Tanzania — simu inayoitwa "Umoja 1". Simu hii, inayouzwa kwa shilingi 450,000, imeundwa kutumia mfumo wa uendeshaji uliobinafsishwa kwa lugha ya Kiswahili na mahitaji ya mtumiaji wa Tanzania.</p><p>Vipengele maalumu ni pamoja na benki ya picha inayoelewa mazingira ya Tanzania, mfumo wa kutafsiri lugha kwa sauti (Kiswahili, Kibena, Kichagga, Kisukuma), na uunganishi wa moja kwa moja na NHIF, TRA na NIDA. Bei hii ni chini ya simu nyingi za China zinazouzwa Tanzania.</p><p>Waanzilishi watatu wa JuaCode, ambao wote ni wahitimu wa Chuo Kikuu cha Dar es Salaam wenye umri kati ya miaka 25-30, wanasema wamepokea maagizo 5,000 katika siku 48 za kwanza tangu uzinduzi. Wizara ya ICT imesema itasaidia kampuni hii kukua na kuajiri vijana wengi zaidi.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(39),
            ],
            [
                'category' => 'simu-na-intaneti',
                'title' => 'Vodacom Tanzania Yazindua 5G Dar es Salaam: Kasi ya Intaneti 10Gbps Inapatikana',
                'excerpt' => 'Vodacom Tanzania imezindua rasmi mtandao wake wa 5G katika maeneo manne ya Dar es Salaam, ikitoa kasi ya intaneti hadi gigabiti 10 kwa sekunde kwa wateja wa kwanza.',
                'content' => '<p>Dar es Salaam — Vodacom Tanzania Plc imezindua rasmi mtandao wake wa kizazi cha tano (5G) katika maeneo manne ya Dar es Salaam: CBD, Masaki, Mikocheni na Kariakoo. Uzinduzi huu, uliofanyika katika sherehe kubwa iliyohudhuria na Waziri wa Mawasiliano, unafanya Tanzania kuwa nchi ya 9 Afrika kuwa na 5G ya kibiashara.</p><p>Mtandao wa 5G wa Vodacom Tanzania unatoa kasi ya kufikia gigabiti 10 kwa sekunde (Gbps) katika maeneo bora, ikilinganishwa na megabiti 50-100 kwa sekunde za 4G za sasa. Kwa wateja wa kawaida, hii inamaanisha kudownload sinema ya saa 2 kwa sekunde 30 tu.</p><p>Bei za SIM kadi na mipango ya 5G imeanza kwa shilingi 15,000 kwa mwezi kwa gigabiti 10, inayoshuka hadi shilingi 8,500 kwa uanachama wa mwaka mzima. Vodacom inalenga kupanua 5G hadi miji 10 Tanzania ifikapo mwishoni mwa 2025.</p>',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(40),
            ],
        ];

        foreach ($articles as $data) {
            $category = Category::where('slug', $data['category'])->first()
                ?? Category::where('slug', 'uchumi')->first();

            if (!$category) continue;

            $slug = \Illuminate\Support\Str::slug($data['title']) . '-' . rand(100, 999);

            Content::updateOrCreate(
                ['slug' => $slug],
                [
                    'title'          => $data['title'],
                    'slug'           => $slug,
                    'excerpt'        => $data['excerpt'],
                    'content'        => $data['content'],
                    'post_type_id'   => $postType->id,
                    'category_id'    => $category->id,
                    'author_id'      => $author->id,
                    'is_featured'    => $data['is_featured'],
                    'status'         => 'published',
                    'published_at'   => $data['published_at'],
                ]
            );
        }
    }
}
