<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurriculumTextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sectionesSetting = config('setting.sectiones');

        $sectionCurriculumPresentacion = $sectionesSetting['curriculumPresentacion']['id'];
        $sectionCurriculumFirm = $sectionesSetting['curriculumFirm']['id'];
        $sectionPortfolioHome = $sectionesSetting['portfolioHome']['id'];
        $sectionCurriculumAboutMe = $sectionesSetting['portfolioAboutMe']['id'];
    }
}
