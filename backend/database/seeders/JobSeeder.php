<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = $this->jobs();

        foreach($jobs as $key => $job){
            Job::create([
                'name' => $job['name'],
                'from' => $job['from'],
                'to' => $job['to'],
                'text_ITA' => $job['text_ITA'],
                'text_ESP' => $job['text_ESP'],
                'text_ENG' => $job['text_ENG'],
                'order' => $key + 1, 
            ]);
        }
    }


    private function jobs(){
        return array(
            [
                'name' => 'Ministero Difesa',
                'from' => '12/2008',
                'to' => '11/2024',
                'text_ITA' => "Graduato Esercito Italiano, specializzato nel corpo Bersaglieri e Fanteria Aeromobile.",
                'text_ESP' => "Graduado Ejercito Italiano con especialidad Bersaglieri y Fanteria Aeromobile.",
                'text_ENG' => "Graduated from the Italian Army, specialized in the Bersaglieri and Airborne Infantry corps.",
            ],
            [
                'name' => 'Full Stack Web Developer',
                'from' => '04/2023',
                'to' => '01/2025',
                'text_ITA' => "Sviluppo web autonomo di progetti complessi, tra cui piattaforme social, siti di e-commerce e portali per la gestione di case vacanze, realizzati utilizzando una combinazione di linguaggi e tecnologie frontend e backend;",
                'text_ESP' => "Desarrollo web autónomo de proyectos complejos, incluyendo plataformas sociales, sitios de comercio electrónico y portales para la gestión de casas vacacionales, realizados utilizando una combinación de lenguajes y tecnologías frontend y backend;",
                'text_ENG' => "Independent web development of complex projects, including social platforms, e-commerce sites and portals for holiday home management, created using a combination of front-end and back-end languages and technologies.",
            ],
            [
                'name' => 'NewTime spa',
                'from' => '02/2025',
                'to' => null,
                'text_ITA' => "Sviluppo applicazioni di tipo preventivatori, configuratori tecnici di vetrate, raccolta logs di dipositivi output. Linguaggi prevalentemente utilizzati: React, Redux, Laravel, Express, Mysql, Mongodb, Bootstrap;",
                'text_ESP' => "Desarrollo de aplicaciones como herramientas de presupuestos, configuradores técnicos de cristales y recopilación de registros de dispositivos de salida. Lenguajes de programación utilizados principalmente: React, Redux, Laravel, Express, Mysql, Mongodb, Bootstrap;",
                'text_ENG' => "Development of applications such as quotation tools, technical glass configurators, and output device log collection. Main programming languages used: React, Redux, Laravel, Express, Mysql, Mongodb, Bootstrap;",
            ],
        );
    }
}
