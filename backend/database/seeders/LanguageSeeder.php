<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = $this->languages();

        foreach($languages as $language){
            Language::create([
                'text_ITA' => $language['text_ITA'],
                'text_ESP' => $language['text_ESP'],
                'text_ENG' => $language['text_ENG'],
                'value' => $language['value'],
            ]);
        }
    }


    private function languages()
    {
        return array(
            [
                'text_ITA' => 'Italiano',
                'text_ESP' => 'Italiano',
                'text_ENG' => 'Italian',
                'value' => 100 
            ],
                  [
                'text_ITA' => 'Spagnolo',
                'text_ESP' => 'Español',
                'text_ENG' => 'Spanish',
                'value' => 88
            ],
                  [
                'text_ITA' => 'Inglese',
                'text_ESP' => 'Ingles',
                'text_ENG' => 'English',
                'value' => 50 
            ],
        );
    }
}
