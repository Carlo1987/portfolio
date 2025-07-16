<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\TimeEnum;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
        $courses = $this->courses();

        foreach($courses as $key => $course){
            Course::create([
                'name' => $course['name'],
                'date' => $course['date'],
                'timeDuration' => $course['timeDuration'],
                'format' => $course['format'],
                'text_ITA' => $course['text_ITA'],
                'text_ESP' => $course['text_ESP'],
                'text_ENG' => $course['text_ENG'],
                'order' => $key +1
            ]);
        }
    }


    private function courses()
    {
        $hours = TimeEnum::hours;
        $monthes = TimeEnum::monthes;
        $years = TimeEnum::years;

        return array(
            [
                'name' => 'Diploma Scientifico Informatico',
                'date' => '07/2006',
                'timeDuration' => 5,
                'format' => $years,
                'text_ITA' => 'Diploma scientifico con specializzazione informatica',
                'text_ESP' => 'Diploma cientifico con especializacion informatica',
                'text_ENG' => 'High school diploma with a specialization in computing'
            ],
            [
                'name' => 'Corso Full Stack Web Developer',
                'date' => '05/2023',
                'timeDuration' => 6,
                'format' => $monthes,
                'text_ITA' => 'Corso professionale di Click Accademy PHP, Mysql, Javascript, CSS3, Html5, Worpress',
                'text_ESP' => 'Curso profesional de Click Accademy de PHP, Mysql, Javascript, CSS3, Html5, Worpress',
                'text_ENG' => 'Professional course by Click Academy: PHP, MySQL, JavaScript, CSS3, HTML5, WordPress'
            ],
            [
                'name' => 'Master Angular, JQuery, NodeJS, Javascript',
                'date' => '10/2023',
                'timeDuration' => 33,
                'format' => $hours,
                'text_ITA' => 'Master con Angular, JQuery, NodeJS e Javascript',
                'text_ESP' => 'Master de Angular, JQuery, NodeJS y Javascript',
                'text_ENG' => 'Masterclass covering Angular, JQuery, NodeJS, and JavaScript.'
            ],
            [
                'name' => 'Master Logica di programmazione',
                'date' => '01/2023',
                'timeDuration' => 8,
                'format' => $hours,
                'text_ITA' => 'Master in logica di programmazione di Javascript',
                'text_ESP' => 'Master en logica de programacion de Javascript',
                'text_ENG' => 'Masterclass in JavaScript programming logic'
            ],
            [
                'name' => 'Corso GIT',
                'date' => '02/2024',
                'timeDuration' => 3,
                'format' => $hours,
                'text_ITA' => 'Corso GIT e console di comando',
                'text_ESP' => 'Curso GIT y terminal de comando',
                'text_ENG' => 'GIT and Command Line Course'
            ],
            [
                'name' => 'Master CSS3 avanzato',
                'date' => '08/2024',
                'timeDuration' => 37.5,
                'format' => $hours,
                'text_ITA' => 'Master avanzato di CSS3',
                'text_ESP' => 'Master avanzado de CSS3',
                'text_ENG' => 'Advanced CSS3 masterclass'
            ],
            [
                'name' => 'Corso VPS',
                'date' => '09/2024',
                'timeDuration' => 10,
                'format' => $hours,
                'text_ITA' => 'Gestione VPS nginx con Letsencryp',
                'text_ESP' => 'Administrar VPS nginx con Letsencrypt',
                'text_ENG' => 'Managing VPS nginx with Letsencrypt'
            ],
            [
                'name' => 'Corso SEO',
                'date' => '10/2024',
                'timeDuration' => 7,
                'format' => $hours,
                'text_ITA' => 'Corso di SEO e posizionamento web',
                'text_ESP' => 'Curso de SEO e posicionamiento web',
                'text_ENG' => 'SEO and web positioning Course'
            ],
            [
                'name' => 'Master Typescript, JS moderno',
                'date' => '11/2024',
                'timeDuration' => 15,
                'format' => $hours,
                'text_ITA' => 'Master Typescipt e Javascript Moderno, ES2024 APIs html5',
                'text_ESP' => 'Master Typescipt y Javascript Moderno, ES2024 APIs html5',
                'text_ENG' => 'Master Typescipt and Modern Javascript, ES2024 APIs html5'
            ],
            [
                'name' => 'Corso Docker',
                'date' => '01/2025',
                'timeDuration' => 5.5,
                'format' => $hours,
                'text_ITA' => 'Corso Docker',
                'text_ESP' => 'Curso Docker',
                'text_ENG' => 'Docker course'
            ],
        );
    }
}
