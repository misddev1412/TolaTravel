<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\AmenitiesTranslation;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\City;
use App\Models\CityTranslation;
use App\Models\Language;
use App\Models\Place;
use App\Models\PlaceTranslation;
use App\Models\PlaceType;
use App\Models\PlaceTypeTranslation;
use App\Models\Post;
use App\Models\PostTranslation;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpgradeController extends Controller
{
    public function upgradeToVersion110()
    {
        /**
         * Modify table: cities, countries, users
         */
        DB::statement('ALTER TABLE cities MODIFY COLUMN id INT(11) unsigned AUTO_INCREMENT');
        DB::statement('ALTER TABLE countries MODIFY COLUMN id INT(11) unsigned AUTO_INCREMENT');
        DB::statement('ALTER TABLE users MODIFY COLUMN id INT(11) unsigned AUTO_INCREMENT');

        /**
         * Login social
         */
        if (!Schema::hasTable('social_accounts')) {
            Schema::create('social_accounts', function (Blueprint $table) {
                $table->integer('user_id');
                $table->string('provider_user_id');
                $table->string('provider');
                $table->timestamps();
            });
            echo "Create tables social_accounts success!<br><br>";
        } else {
            echo "Table social_accounts already exists<br><br>";
        }

        /**
         * Migrate table categories
         */
        if (!Schema::hasTable('category_translations')) {
            Schema::create('category_translations', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('category_id')->unsigned();
                $table->string('locale')->index();
                $table->string('name')->nullable();
                $table->unique(['category_id', 'locale']);
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            });
            echo "Create tables category_translations success!<br>";

            $categories = Category::all();
            foreach ($categories as $cat) {
                $model_category_translation = new CategoryTranslation();
                $model_category_translation->category_id = $cat->id;
                $model_category_translation->locale = "en";
                $model_category_translation->name = $cat->name;
                $model_category_translation->save();
            }
            echo "Move data categories to category_translations success!<br><br>";

        } else {
            echo "Table category_translations already exists<br><br>";
        }


        /**
         * Migrate table posts
         */
        if (!Schema::hasTable('post_translations')) {
            Schema::create('post_translations', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('post_id')->unsigned();
                $table->string('locale')->index();
                $table->string('title')->nullable();
                $table->longText('content')->nullable();
                $table->unique(['post_id', 'locale']);
                $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            });
            echo "Create tables post_translations success!<br>";

            $posts = Post::all();
            foreach ($posts as $post) {
                $model_post_translations = new PostTranslation();
                $model_post_translations->post_id = $post->id;
                $model_post_translations->locale = "en";
                $model_post_translations->title = $post->title;
                $model_post_translations->content = $post->content;
                $model_post_translations->save();
            }
            echo "Move data posts to post_translations success!<br><br>";

        } else {
            echo "Table post_translations already exists<br><br>";
        }


        /**
         * Migrate table place_types
         */
        if (!Schema::hasTable('place_type_translations')) {
            Schema::create('place_type_translations', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('place_type_id')->unsigned();
                $table->string('locale')->index();
                $table->string('name')->nullable();
                $table->unique(['place_type_id', 'locale']);
                $table->foreign('place_type_id')->references('id')->on('place_types')->onDelete('cascade');
            });
            echo "Create tables place_type_translations success!<br>";

            $place_types = PlaceType::all();
            foreach ($place_types as $type) {
                $model_place_type_translation = new PlaceTypeTranslation();
                $model_place_type_translation->place_type_id = $type->id;
                $model_place_type_translation->locale = "en";
                $model_place_type_translation->name = $type->name;
                $model_place_type_translation->save();
            }
            echo "Move data place_types to place_type_translations success!<br><br>";
        } else {
            echo "Table place_type_translations already exists<br><br>";
        }


        /**
         * Migrate table places
         */
        if (!Schema::hasTable('place_translations')) {
            Schema::create('place_translations', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('place_id')->unsigned();
                $table->string('locale')->index();
                $table->string('name')->nullable();
                $table->longText('description')->nullable();
                $table->unique(['place_id', 'locale']);
                $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
            });
            echo "Create tables place_translations success!<br>";

            $places = Place::all();
            foreach ($places as $place) {
                $model_place_translation = new PlaceTranslation();
                $model_place_translation->place_id = $place->id;
                $model_place_translation->locale = "en";
                $model_place_translation->name = $place->name;
                $model_place_translation->description = $place->description;
                $model_place_translation->save();
            }
            echo "Move data places to place_translations success!<br><br>";
        } else {
            echo "Table place_translations already exists<br><br>";
        }


        /**
         * Migrate table amenities
         */
        if (!Schema::hasTable('amenities_translations')) {
            Schema::create('amenities_translations', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('amenities_id')->unsigned();
                $table->string('locale')->index();
                $table->string('name')->nullable();
                $table->unique(['amenities_id', 'locale']);
                $table->foreign('amenities_id')->references('id')->on('amenities')->onDelete('cascade');
            });
            echo "Create tables amenities_translations success!<br>";

            $amenities = Amenities::all();
            foreach ($amenities as $item) {
                $model_amenities_translation = new AmenitiesTranslation();
                $model_amenities_translation->amenities_id = $item->id;
                $model_amenities_translation->locale = "en";
                $model_amenities_translation->name = $item->name;
                $model_amenities_translation->save();
            }
            echo "Move data amenities to amenities_translations success!<br><br>";
        } else {
            echo "Table amenities_translations already exists<br><br>";
        }


        /**
         * Migrate table cities
         */
        if (!Schema::hasTable('city_translations')) {
            Schema::create('city_translations', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('city_id')->unsigned();
                $table->string('locale')->index();
                $table->string('name')->nullable();
                $table->string('intro')->nullable();
                $table->string('description')->nullable();
                $table->unique(['city_id', 'locale']);
                $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            });
            echo "Create tables city_translations success!<br>";
            $cities = City::all();
            foreach ($cities as $city) {
                $model_city_translation = new  CityTranslation();
                $model_city_translation->city_id = $city->id;
                $model_city_translation->locale = "en";
                $model_city_translation->name = $city->name;
                $model_city_translation->intro = $city->intro;
                $model_city_translation->description = $city->description;
                $model_city_translation->save();
            }
            echo "Move data cities to city_translations success!<br><br>";

        } else {
            echo "Table city_translations already exists<br><br>";
        }

        echo "<hr>";

        /**
         * Update, add column for SEO
         */
        $db_tables = ['cities', 'places', 'posts', 'categories'];
        foreach ($db_tables as $tbl):
            Schema::table($tbl, function ($table) use ($tbl) {
                if (!Schema::hasColumn($tbl, 'seo_description')) {
                    $table->string('seo_description')->nullable()->after('status');
                    echo "Add column '{$tbl}.seo_description' success!<br>";
                } else {
                    echo "Column '{$tbl}.seo_description' already exists<br>";
                }
                if (!Schema::hasColumn($tbl, 'seo_title')) {
                    $table->string('seo_title')->nullable()->after('status');
                    echo "Add column '{$tbl}.seo_title' success!<br><br>";
                } else {
                    echo "Column '{$tbl}.seo_title' already exists<br><br>";
                }
            });
        endforeach;


        /**
         * Migrate languages
         */
        if (!Schema::hasTable('languages')) {
            Schema::create('languages', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('native_name');
                $table->string('code');
                $table->integer('is_default');
                $table->integer('is_active');
                $table->timestamps();
            });

            $data_languages = [
                ["code" => "ab", "name" => "Abkhaz", "nativeName" => "аҧсуа"],
                ["code" => "aa", "name" => "Afar", "nativeName" => "Afaraf"],
                ["code" => "af", "name" => "Afrikaans", "nativeName" => "Afrikaans"],
                ["code" => "ak", "name" => "Akan", "nativeName" => "Akan"],
                ["code" => "sq", "name" => "Albanian", "nativeName" => "Shqip"],
                ["code" => "am", "name" => "Amharic", "nativeName" => "አማርኛ"],
                ["code" => "ar", "name" => "Arabic", "nativeName" => "العربية"],
                ["code" => "an", "name" => "Aragonese", "nativeName" => "Aragonés"],
                ["code" => "hy", "name" => "Armenian", "nativeName" => "Հայերեն"],
                ["code" => "as", "name" => "Assamese", "nativeName" => "অসমীয়া"],
                ["code" => "av", "name" => "Avaric", "nativeName" => "авар мацӀ, магӀарул мацӀ"],
                ["code" => "ae", "name" => "Avestan", "nativeName" => "avesta"],
                ["code" => "ay", "name" => "Aymara", "nativeName" => "aymar aru"],
                ["code" => "az", "name" => "Azerbaijani", "nativeName" => "azərbaycan dili"],
                ["code" => "bm", "name" => "Bambara", "nativeName" => "bamanankan"],
                ["code" => "ba", "name" => "Bashkir", "nativeName" => "башҡорт теле"],
                ["code" => "eu", "name" => "Basque", "nativeName" => "euskara, euskera"],
                ["code" => "be", "name" => "Belarusian", "nativeName" => "Беларуская"],
                ["code" => "bn", "name" => "Bengali", "nativeName" => "বাংলা"],
                ["code" => "bh", "name" => "Bihari", "nativeName" => "भोजपुरी"],
                ["code" => "bi", "name" => "Bislama", "nativeName" => "Bislama"],
                ["code" => "bs", "name" => "Bosnian", "nativeName" => "bosanski jezik"],
                ["code" => "br", "name" => "Breton", "nativeName" => "brezhoneg"],
                ["code" => "bg", "name" => "Bulgarian", "nativeName" => "български език"],
                ["code" => "my", "name" => "Burmese", "nativeName" => "ဗမာစာ"],
                ["code" => "ca", "name" => "Catalan; Valencian", "nativeName" => "Català"],
                ["code" => "ch", "name" => "Chamorro", "nativeName" => "Chamoru"],
                ["code" => "ce", "name" => "Chechen", "nativeName" => "нохчийн мотт"],
                ["code" => "ny", "name" => "Chichewa; Chewa; Nyanja", "nativeName" => "chiCheŵa, chinyanja"],
                ["code" => "zh", "name" => "Chinese", "nativeName" => "中文 (Zhōngwén), 汉语, 漢語"],
                ["code" => "cv", "name" => "Chuvash", "nativeName" => "чӑваш чӗлхи"],
                ["code" => "kw", "name" => "Cornish", "nativeName" => "Kernewek"],
                ["code" => "co", "name" => "Corsican", "nativeName" => "corsu, lingua corsa"],
                ["code" => "cr", "name" => "Cree", "nativeName" => "ᓀᐦᐃᔭᐍᐏᐣ"],
                ["code" => "hr", "name" => "Croatian", "nativeName" => "hrvatski"],
                ["code" => "cs", "name" => "Czech", "nativeName" => "česky, čeština"],
                ["code" => "da", "name" => "Danish", "nativeName" => "dansk"],
                ["code" => "dv", "name" => "Divehi; Dhivehi; Maldivian;", "nativeName" => "ދިވެހި"],
                ["code" => "nl", "name" => "Dutch", "nativeName" => "Nederlands, Vlaams"],
                ["code" => "en", "name" => "English", "nativeName" => "English"],
                ["code" => "eo", "name" => "Esperanto", "nativeName" => "Esperanto"],
                ["code" => "et", "name" => "Estonian", "nativeName" => "eesti, eesti keel"],
                ["code" => "ee", "name" => "Ewe", "nativeName" => "Eʋegbe"],
                ["code" => "fo", "name" => "Faroese", "nativeName" => "føroyskt"],
                ["code" => "fj", "name" => "Fijian", "nativeName" => "vosa Vakaviti"],
                ["code" => "fi", "name" => "Finnish", "nativeName" => "suomi, suomen kieli"],
                ["code" => "fr", "name" => "French", "nativeName" => "français, langue française"],
                ["code" => "ff", "name" => "Fula; Fulah; Pulaar; Pular", "nativeName" => "Fulfulde, Pulaar, Pular"],
                ["code" => "gl", "name" => "Galician", "nativeName" => "Galego"],
                ["code" => "ka", "name" => "Georgian", "nativeName" => "ქართული"],
                ["code" => "de", "name" => "German", "nativeName" => "Deutsch"],
                ["code" => "el", "name" => "Greek, Modern", "nativeName" => "Ελληνικά"],
                ["code" => "gn", "name" => "Guaraní", "nativeName" => "Avañeẽ"],
                ["code" => "gu", "name" => "Gujarati", "nativeName" => "ગુજરાતી"],
                ["code" => "ht", "name" => "Haitian; Haitian Creole", "nativeName" => "Kreyòl ayisyen"],
                ["code" => "ha", "name" => "Hausa", "nativeName" => "Hausa, هَوُسَ"],
                ["code" => "he", "name" => "Hebrew (modern)", "nativeName" => "עברית"],
                ["code" => "hz", "name" => "Herero", "nativeName" => "Otjiherero"],
                ["code" => "hi", "name" => "Hindi", "nativeName" => "हिन्दी, हिंदी"],
                ["code" => "ho", "name" => "Hiri Motu", "nativeName" => "Hiri Motu"],
                ["code" => "hu", "name" => "Hungarian", "nativeName" => "Magyar"],
                ["code" => "ia", "name" => "Interlingua", "nativeName" => "Interlingua"],
                ["code" => "id", "name" => "Indonesian", "nativeName" => "Bahasa Indonesia"],
                ["code" => "ie", "name" => "Interlingue", "nativeName" => "Originally called Occidental; then Interlingue after WWII"],
                ["code" => "ga", "name" => "Irish", "nativeName" => "Gaeilge"],
                ["code" => "ig", "name" => "Igbo", "nativeName" => "Asụsụ Igbo"],
                ["code" => "ik", "name" => "Inupiaq", "nativeName" => "Iñupiaq, Iñupiatun"],
                ["code" => "io", "name" => "Ido", "nativeName" => "Ido"],
                ["code" => "is", "name" => "Icelandic", "nativeName" => "Íslenska"],
                ["code" => "it", "name" => "Italian", "nativeName" => "Italiano"],
                ["code" => "iu", "name" => "Inuktitut", "nativeName" => "ᐃᓄᒃᑎᑐᑦ"],
                ["code" => "ja", "name" => "Japanese", "nativeName" => "日本語 (にほんご／にっぽんご)"],
                ["code" => "jv", "name" => "Javanese", "nativeName" => "basa Jawa"],
                ["code" => "kl", "name" => "Kalaallisut, Greenlandic", "nativeName" => "kalaallisut, kalaallit oqaasii"],
                ["code" => "kn", "name" => "Kannada", "nativeName" => "ಕನ್ನಡ"],
                ["code" => "kr", "name" => "Kanuri", "nativeName" => "Kanuri"],
                ["code" => "ks", "name" => "Kashmiri", "nativeName" => "कश्मीरी, كشميري‎"],
                ["code" => "kk", "name" => "Kazakh", "nativeName" => "Қазақ тілі"],
                ["code" => "km", "name" => "Khmer", "nativeName" => "ភាសាខ្មែរ"],
                ["code" => "ki", "name" => "Kikuyu, Gikuyu", "nativeName" => "Gĩkũyũ"],
                ["code" => "rw", "name" => "Kinyarwanda", "nativeName" => "Ikinyarwanda"],
                ["code" => "ky", "name" => "Kirghiz, Kyrgyz", "nativeName" => "кыргыз тили"],
                ["code" => "kv", "name" => "Komi", "nativeName" => "коми кыв"],
                ["code" => "kg", "name" => "Kongo", "nativeName" => "KiKongo"],
                ["code" => "ko", "name" => "Korean", "nativeName" => "한국어 (韓國語), 조선말 (朝鮮語)"],
                ["code" => "ku", "name" => "Kurdish", "nativeName" => "Kurdî, كوردی‎"],
                ["code" => "kj", "name" => "Kwanyama, Kuanyama", "nativeName" => "Kuanyama"],
                ["code" => "la", "name" => "Latin", "nativeName" => "latine, lingua latina"],
                ["code" => "lb", "name" => "Luxembourgish, Letzeburgesch", "nativeName" => "Lëtzebuergesch"],
                ["code" => "lg", "name" => "Luganda", "nativeName" => "Luganda"],
                ["code" => "li", "name" => "Limburgish, Limburgan, Limburger", "nativeName" => "Limburgs"],
                ["code" => "ln", "name" => "Lingala", "nativeName" => "Lingála"],
                ["code" => "lo", "name" => "Lao", "nativeName" => "ພາສາລາວ"],
                ["code" => "lt", "name" => "Lithuanian", "nativeName" => "lietuvių kalba"],
                ["code" => "lu", "name" => "Luba-Katanga", "nativeName" => ""],
                ["code" => "lv", "name" => "Latvian", "nativeName" => "latviešu valoda"],
                ["code" => "gv", "name" => "Manx", "nativeName" => "Gaelg, Gailck"],
                ["code" => "mk", "name" => "Macedonian", "nativeName" => "македонски јазик"],
                ["code" => "mg", "name" => "Malagasy", "nativeName" => "Malagasy fiteny"],
                ["code" => "ms", "name" => "Malay", "nativeName" => "bahasa Melayu, بهاس ملايو‎"],
                ["code" => "ml", "name" => "Malayalam", "nativeName" => "മലയാളം"],
                ["code" => "mt", "name" => "Maltese", "nativeName" => "Malti"],
                ["code" => "mi", "name" => "Māori", "nativeName" => "te reo Māori"],
                ["code" => "mr", "name" => "Marathi (Marāṭhī)", "nativeName" => "मराठी"],
                ["code" => "mh", "name" => "Marshallese", "nativeName" => "Kajin M̧ajeļ"],
                ["code" => "mn", "name" => "Mongolian", "nativeName" => "монгол"],
                ["code" => "na", "name" => "Nauru", "nativeName" => "Ekakairũ Naoero"],
                ["code" => "nv", "name" => "Navajo, Navaho", "nativeName" => "Diné bizaad, Dinékʼehǰí"],
                ["code" => "nb", "name" => "Norwegian Bokmål", "nativeName" => "Norsk bokmål"],
                ["code" => "nd", "name" => "North Ndebele", "nativeName" => "isiNdebele"],
                ["code" => "ne", "name" => "Nepali", "nativeName" => "नेपाली"],
                ["code" => "ng", "name" => "Ndonga", "nativeName" => "Owambo"],
                ["code" => "nn", "name" => "Norwegian Nynorsk", "nativeName" => "Norsk nynorsk"],
                ["code" => "no", "name" => "Norwegian", "nativeName" => "Norsk"],
                ["code" => "ii", "name" => "Nuosu", "nativeName" => "ꆈꌠ꒿ Nuosuhxop"],
                ["code" => "nr", "name" => "South Ndebele", "nativeName" => "isiNdebele"],
                ["code" => "oc", "name" => "Occitan", "nativeName" => "Occitan"],
                ["code" => "oj", "name" => "Ojibwe, Ojibwa", "nativeName" => "ᐊᓂᔑᓈᐯᒧᐎᓐ"],
                ["code" => "cu", "name" => "Old Church Slavonic, Church Slavic, Church Slavonic, Old Bulgarian, Old Slavonic", "nativeName" => "ѩзыкъ словѣньскъ"],
                ["code" => "om", "name" => "Oromo", "nativeName" => "Afaan Oromoo"],
                ["code" => "or", "name" => "Oriya", "nativeName" => "ଓଡ଼ିଆ"],
                ["code" => "os", "name" => "Ossetian, Ossetic", "nativeName" => "ирон æвзаг"],
                ["code" => "pa", "name" => "Panjabi, Punjabi", "nativeName" => "ਪੰਜਾਬੀ, پنجابی‎"],
                ["code" => "pi", "name" => "Pāli", "nativeName" => "पाऴि"],
                ["code" => "fa", "name" => "Persian", "nativeName" => "فارسی"],
                ["code" => "pl", "name" => "Polish", "nativeName" => "polski"],
                ["code" => "ps", "name" => "Pashto, Pushto", "nativeName" => "پښتو"],
                ["code" => "pt", "name" => "Portuguese", "nativeName" => "Português"],
                ["code" => "qu", "name" => "Quechua", "nativeName" => "Runa Simi, Kichwa"],
                ["code" => "rm", "name" => "Romansh", "nativeName" => "rumantsch grischun"],
                ["code" => "rn", "name" => "Kirundi", "nativeName" => "kiRundi"],
                ["code" => "ro", "name" => "Romanian, Moldavian, Moldovan", "nativeName" => "română"],
                ["code" => "ru", "name" => "Russian", "nativeName" => "русский язык"],
                ["code" => "sa", "name" => "Sanskrit (Saṁskṛta)", "nativeName" => "संस्कृतम्"],
                ["code" => "sc", "name" => "Sardinian", "nativeName" => "sardu"],
                ["code" => "sd", "name" => "Sindhi", "nativeName" => "सिन्धी, سنڌي، سندھی‎"],
                ["code" => "se", "name" => "Northern Sami", "nativeName" => "Davvisámegiella"],
                ["code" => "sm", "name" => "Samoan", "nativeName" => "gagana faa Samoa"],
                ["code" => "sg", "name" => "Sango", "nativeName" => "yângâ tî sängö"],
                ["code" => "sr", "name" => "Serbian", "nativeName" => "српски језик"],
                ["code" => "gd", "name" => "Scottish Gaelic; Gaelic", "nativeName" => "Gàidhlig"],
                ["code" => "sn", "name" => "Shona", "nativeName" => "chiShona"],
                ["code" => "si", "name" => "Sinhala, Sinhalese", "nativeName" => "සිංහල"],
                ["code" => "sk", "name" => "Slovak", "nativeName" => "slovenčina"],
                ["code" => "sl", "name" => "Slovene", "nativeName" => "slovenščina"],
                ["code" => "so", "name" => "Somali", "nativeName" => "Soomaaliga, af Soomaali"],
                ["code" => "st", "name" => "Southern Sotho", "nativeName" => "Sesotho"],
                ["code" => "es", "name" => "Spanish; Castilian", "nativeName" => "español, castellano"],
                ["code" => "su", "name" => "Sundanese", "nativeName" => "Basa Sunda"],
                ["code" => "sw", "name" => "Swahili", "nativeName" => "Kiswahili"],
                ["code" => "ss", "name" => "Swati", "nativeName" => "SiSwati"],
                ["code" => "sv", "name" => "Swedish", "nativeName" => "svenska"],
                ["code" => "ta", "name" => "Tamil", "nativeName" => "தமிழ்"],
                ["code" => "te", "name" => "Telugu", "nativeName" => "తెలుగు"],
                ["code" => "tg", "name" => "Tajik", "nativeName" => "тоҷикӣ, toğikī, تاجیکی‎"],
                ["code" => "th", "name" => "Thai", "nativeName" => "ไทย"],
                ["code" => "ti", "name" => "Tigrinya", "nativeName" => "ትግርኛ"],
                ["code" => "bo", "name" => "Tibetan Standard, Tibetan, Central", "nativeName" => "བོད་ཡིག"],
                ["code" => "tk", "name" => "Turkmen", "nativeName" => "Türkmen, Түркмен"],
                ["code" => "tl", "name" => "Tagalog", "nativeName" => "Wikang Tagalog, ᜏᜒᜃᜅ᜔ ᜆᜄᜎᜓᜄ᜔"],
                ["code" => "tn", "name" => "Tswana", "nativeName" => "Setswana"],
                ["code" => "to", "name" => "Tonga (Tonga Islands)", "nativeName" => "faka Tonga"],
                ["code" => "tr", "name" => "Turkish", "nativeName" => "Türkçe"],
                ["code" => "ts", "name" => "Tsonga", "nativeName" => "Xitsonga"],
                ["code" => "tt", "name" => "Tatar", "nativeName" => "татарча, tatarça, تاتارچا‎"],
                ["code" => "tw", "name" => "Twi", "nativeName" => "Twi"],
                ["code" => "ty", "name" => "Tahitian", "nativeName" => "Reo Tahiti"],
                ["code" => "ug", "name" => "Uighur, Uyghur", "nativeName" => "Uyƣurqə, ئۇيغۇرچە‎"],
                ["code" => "uk", "name" => "Ukrainian", "nativeName" => "українська"],
                ["code" => "ur", "name" => "Urdu", "nativeName" => "اردو"],
                ["code" => "uz", "name" => "Uzbek", "nativeName" => "zbek, Ўзбек, أۇزبېك‎"],
                ["code" => "ve", "name" => "Venda", "nativeName" => "Tshivenḓa"],
                ["code" => "vi", "name" => "Vietnamese", "nativeName" => "Tiếng Việt"],
                ["code" => "vo", "name" => "Volapük", "nativeName" => "Volapük"],
                ["code" => "wa", "name" => "Walloon", "nativeName" => "Walon"],
                ["code" => "cy", "name" => "Welsh", "nativeName" => "Cymraeg"],
                ["code" => "wo", "name" => "Wolof", "nativeName" => "Wollof"],
                ["code" => "fy", "name" => "Western Frisian", "nativeName" => "Frysk"],
                ["code" => "xh", "name" => "Xhosa", "nativeName" => "isiXhosa"],
                ["code" => "yi", "name" => "Yiddish", "nativeName" => "ייִדיש"],
                ["code" => "yo", "name" => "Yoruba", "nativeName" => "Yorùbá"],
                ["code" => "za", "name" => "Zhuang, Chuang", "nativeName" => "Saɯ cueŋƅ, Saw cuengh"]
            ];
            foreach ($data_languages as $lang) {
                $language = new Language();
                $language->name = $lang['name'];
                $language->native_name = $lang['nativeName'];
                $language->code = $lang['code'];

                if ($lang['code'] == 'en') {
                    $language->is_default = Language::IS_DEFAULT;
                    $language->is_active = Language::STATUS_ACTIVE;
                } else {
                    $language->is_default = 0;
                    $language->is_active = 0;
                }

                $language->save();
            }
        } else {
            echo "Table languages already exists<br><br>";
        }

        if (!Schema::hasTable('ltm_translations')) {
            Schema::create('ltm_translations', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('status')->default(0);
                $table->string('locale');
                $table->string('group');
                $table->text('key');
                $table->text('value')->nullable();
                $table->timestamps();
            });
            echo "Create tables ltm_translations success!<br><br>";
        } else {
            echo "Table ltm_translations already exists<br><br>";
        }

        if (!Schema::hasTable('jobs')) {
            Schema::create('jobs', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('queue')->index();
                $table->longText('payload');
                $table->unsignedTinyInteger('attempts');
                $table->unsignedInteger('reserved_at')->nullable();
                $table->unsignedInteger('available_at');
                $table->unsignedInteger('created_at');
            });
            echo "Create tables jobs success!<br><br>";
        } else {
            echo "Table ltm_translations already exists<br><br>";
        }

        Schema::table('password_resets', function (Blueprint $table) {
            if (!Schema::hasColumn('password_resets', 'email')) {
                $table->string('email')->index();
                echo "Add column 'password_resets.email' success!<br>";
            } else {
                echo "Column 'password_resets.email' already exists<br>";
            }

            if (!Schema::hasColumn('password_resets', 'token')) {
                $table->string('token');
                echo "Add column 'password_resets.token' success!<br>";
            } else {
                echo "Column 'password_resets.token' already exists<br>";
            }

            if (!Schema::hasColumn('password_resets', 'created_at')) {
                $table->timestamps();
                echo "Add column 'password_resets.created_at' success!<br>";
            } else {
                echo "Column 'password_resets.created_at' already exists<br>";
            }
        });

        Schema::table('settings', function (Blueprint $table) {
            $table->text('val')->nullable()->change();
            echo "Column 'settings.val' change success!<br><br>";
        });

        $admincp_url = route('admin_dashboard');
        $home_url = route('home');
        return "Upgrade to Golo 1.1.0 success! <a href='{$admincp_url}'>Back to admincp</a> or <a href='{$home_url}'>Homepage</a>";
    }

    public function upgradeToVersion112()
    {
        /**
         * Add column: category_translations.feature_title
         */
        Schema::table('category_translations', function (Blueprint $table) {
            if (!Schema::hasColumn('category_translations', 'feature_title')) {
                $table->string('feature_title')->nullable();
                echo "Add column 'category_translations.feature_title' success!<br>";
            } else {
                echo "Column 'category_translations.feature_title' already exists<br>";
            }
        });

        /**
         * Add column: users.api_token
         */
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'api_token')) {
                $table->string('api_token', 80)->nullable()->after('remember_token');
                echo "Add column 'users.api_token' success!<br>";
            } else {
                echo "Column 'users.api_token' already exists<br>";
            }
        });

        $admincp_url = route('admin_dashboard');
        $home_url = route('home');
        return "Upgrade to Golo 1.1.2 success! <a href='{$admincp_url}'>Back to admincp</a> or <a href='{$home_url}'>Homepage</a>";
    }

    public function upgradeToVersion114()
    {
        Schema::table('categories', function (Blueprint $table) {
            if (!Schema::hasColumn('categories', 'color_code')) {
                $table->string('color_code', 80)->nullable()->after('icon_map_marker');
                echo "Add column 'categories.color_code' success!<br>";
            } else {
                echo "Column 'categories.color_code' already exists<br><br>";
            }
        });

        if (!Schema::hasTable('testimonials')) {
            Schema::create('testimonials', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('job_title');
                $table->string('avatar');
                $table->string('content');
                $table->integer('status')->default(1);
                $table->timestamps();
            });
            echo "Create tables testimonials success!<br><br>";
        } else {
            echo "Table testimonials already exists<br>";
        }

        if (!Schema::hasTable('testimonial_translations')) {
            Schema::create('testimonial_translations', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('testimonial_id');
                $table->string('locale', 10);
                $table->string('name');
                $table->string('job_title');
                $table->string('content', 500);
                $table->timestamps();
            });
            echo "Create tables testimonial_translations success!<br><br>";
        } else {
            echo "Table testimonial_translations already exists<br><br>";
        }


    }

}
