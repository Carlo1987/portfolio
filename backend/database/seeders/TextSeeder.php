<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Text;

class TextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $textsData = $this->texts();

        foreach($textsData as $data){
            $section = $data['section'];
            foreach($data['texts'] as $key => $text){
                Text::create([
                    'section' => $section,
                    'text_ITA' => $text['text_ITA'],
                    'text_ESP' => $text['text_ESP'],
                    'text_ENG' => $text['text_ENG'],
                    'order' => $key + 1
                ]);
            }
        }
    }



    private function texts()
    {
        $sectionesSetting = config('setting.sectiones');

        $curriculumPresentacionId = $sectionesSetting['curriculumPresentacion']['id'];
        $curriculumFirmId = $sectionesSetting['curriculumFirm']['id'];
        $portfolioHomeId = $sectionesSetting['portfolioHome']['id'];
        $portfolioAboutMeId = $sectionesSetting['portfolioAboutMe']['id'];

        $timeToDeveloper = $this->timeToDeveloper();

        return array(
            [
                'section' => $curriculumPresentacionId,
                'texts' =>  array(
                            [
                                'text_ITA' => "Competente nell'implementazione di pattern architetturali
                                                come MVC e MVVM, nella progettazione e nello sviluppo
                                                di API REST e nell'uso dei metodi CRUD su database
                                                relazionali e non relazionali.",
                                'text_ESP' => "Competente en la implementación de patrones
                                                arquitectónicos como MVC y MVVM, en el diseño y
                                                desarrollo de API REST, en el manejo de los métodos
                                                CRUD con bases de datos relacionales y no relacionales.",
                                'text_ENG' => "Skilled in implementing architectural patterns like MVC
                                                and MVVM, designing and developing REST APIs, and
                                                using CRUD methods on relational and non-relational
                                                databases.",
                            ],
                            [
                                'text_ITA' => "Web Developer specializzato nello sviluppo front-end e
                                                back-end con solida esperienza nella programmazione
                                                orientata agli oggetti usando vari linguaggi di
                                                programmazione.",
                                'text_ESP' => "Desarrollador Web especializado en el desarrollo front-
                                                end y back-end con sólida experiencia en programación
                                                orientada a objetos utilizando varios lenguajes de
                                                programación.",
                                'text_ENG' => "Web Developer specializing in front-end and back-end
                                                development with solid experience in object-oriented
                                                programming using various programming languages.",
                            ],
                        ),
            ],
            [
                'section' => $curriculumFirmId,
                'texts' =>  array(
                            [
                                'text_ITA' => "Autorizzo il trattamento dei miei dati personali ai sensi
                                                ai sensi del Decreto Legislativo 196/2003, coordinato
                                                con il Decreto Legislativo 101/2018, e dell'art. 13 del
                                                GDPR (Regolamento UE 2016/679) ai fini della ricerca
                                                e selezione personale",
                                'text_ESP' => "Autorizo el tratamiento de mis datos personales de
                                                conformidad con el Reglamento General de Protección
                                                de Datos (RGPD - Reglamento UE 2016/679) y las
                                                normativas locales aplicables, exclusivamente con
                                                fines de selección y reclutamiento de personal",
                                'text_ENG' => "I hereby authorize the processing of my personal data
                                                in accordance with Legislative Decree 196/2003, as
                                                amended by Legislative Decree 101/2018, and Article
                                                13 of the GDPR (EU Regulation 2016/679) for the
                                                purposes of recruitment and selection.",
                            ],
                        ),
            ],
            [
                'section' => $portfolioHomeId,
                'texts' =>  array(
                            [
                                'text_ITA' => "I miei contatti sono visibili anche nel Curriculum, ma se non vuoi perdere tempo allora non esitare e scrivimi subito!",
                                'text_ESP' => "Mis contactos son visibles tambien en el Curriculum, si pero no quieres perder tiempo no lo dudes y escribeme immediatamente!",
                                'text_ENG' => "My contact details are also visible in the Curriculum, but if you don't want to waste time, don't hesitate and write to me now!",
                            ],
                            [
                                'text_ITA' => "Informazioni generali su di me, dal mio passato fino a come ho deciso di percorrere la carriera di Sviluppatore Web. Niente di troppo lungo, non preoccuparti!",
                                'text_ESP' => "Informaciones generales sobre mi, a partir de mi pasado hasta como decidì conseguir la carrera de Web Developer. No es muy larga, no te preocupes!",
                                'text_ENG' => "General information about me, from my past to how I decided to pursue a career as a Web Developer. It's not long, don't worry!",
                            ],
                            [
                                'text_ITA' => "I progetti che ho creato fino ad'ora in ordine crescente dal più recente al più vecchio, in ogni progetto cerco sempre un nuovo tema che mi ispiri e mi guidi.",
                                'text_ESP' => "Los proyectos que he creado hasta ahora en orden ascendente de más nuevo a más antiguo, en cada proyecto busco siempre un nuevo tema para inspirarme y guiarme.",
                                'text_ENG' => "The projects I have created so far are listed in ascending order from the most recent to the oldest. In each project, I always look for a new theme that inspires and guides me.",
                            ],
                            [
                                'text_ITA' => "Le skills che ho acquisito fino ad ora mi permettono di creare un intero progetto Full Stack da zero, 
                                                dandomi la possibilità di scegliere quale linguaggio di programmazione sia meglio usare per l'occorrenza.",
                                'text_ESP' => "Las skills que he logrado hasta ahora me permiten crear un entero proyecto Full Stack a partir de zero, 
                                                dandome la posibilidad de elegir el linguaje de programacion que creo sea el mejor por la ocasion.",
                                'text_ENG' => "The skills I have acquired so far allow me to create a complete Full Stack project from scratch, 
                                                giving me the flexibility to choose the best programming language for each situation.",
                            ],
                        ),
            ],
            [
                'section' => $portfolioAboutMeId,
                'texts' =>  array(
                            [
                                'text_ITA' => "Mi piace il lavoro di squadra e la realizzazione di obiettivi condivisi che portino il team a livelli sempre più alti!!",
                                'text_ESP' => "Me gusta trabajar en equipo y realizar objetivos comunes que lleven el team a niveles siempre mas altos!!",
                                'text_ENG' => "I enjoy teamwork and achieving shared goals that help the team reach ever higher levels!!",
                            ],
                            [
                                'text_ITA' => "Nel corso del tempo sono sempre stato appassionato all'informatica, facendo lavori e progetti web fino a quando 3 anni fa ho preso la decisione di farla diventare la mia nuova professione a tempo pieno!!",
                                'text_ESP' => "En todo el tiempo siempre estuve apasionado a la informatica haciendo projectos y trabojos web hasta que hace 3 años decidì canvertirlo en mi nuevo trabajo!!",
                                'text_ENG' => "Over time, I have always been passionate about IT, working on web projects until 3 years ago when I decided to make it my new full-time profession!!",
                            ],
                            [
                                'text_ITA' => "Sono stato militare per 16 anni, facendo missioni sia in territorio italiano che all'estero, ricoprendo incarichi di sicurezza e imparando il valore del lavoro di squadra anche in situazioni di forte pressione.",
                                'text_ESP' => "He sido militar por 16 años, haciendo misiones milatares dentro y fuera del territorio italiano, teniendo encargos de seguridad y aprendiendo el valor de trajar en equipo en situaciones estresantes.",
                                'text_ENG' => "I was a soldier for 16 years, undertaking missions both in Italy and abroad, handling security duties and learning the value of teamwork even in high-pressure situations.",
                            ],
                            [
                                'text_ITA' => "Mi trovo nel mondo dello sviluppo web da $timeToDeveloper anni, un mondo che mi ha conquistato e rapito.",
                                'text_ESP' => "Llevo $timeToDeveloper años en el mundo del desarrollo web, un mundo que me ha conquistado y fascinado.",
                                'text_ENG' => "I have been in the web development world for $timeToDeveloper years, a world that has fascinated and captivated me.",
                            ],
                            [
                                'text_ITA' => "Ciao! Sono Carlo, Full Stack Web Developer sempre alla ricerca di nuove sfide che mi permettano di regalare agli utenti l'esperienza che cercano!!",
                                'text_ESP' => "Hola! Soy Carlo, Full Stack Web Developer siempre en busqueda de nuevos desafios que me permitan regalar a los usuarios la experiencia que van buscando!!",
                                'text_ENG' => "Hi! I am Carlo, a Full Stack Web Developer always looking for new challenges that allow me to give users the experience they seek!!",
                            ],
                        ),
            ],
      
        );
    }


    private function timeToDeveloper() : int
    {
        $currentYear = Carbon::now()->year;
        $startDevYear = 2022;
        return $currentYear - $startDevYear;
    }
}
