
<?php


require 'projects.php';
require 'courses.php';
require 'jobs.php';


$name_pdf = "Curriculum Loi Carlo italiano.pdf";



$curriculum = array(
    'contacts' => [
        'title' => 'contatti',
        'telephone' => 'Telefono',
        'location' => 'Località'
    ],


    'skills' => [
        'title' => "Abilita'",
        'library' => 'Librerie'
    ],


    'languages' => [
        'title' => 'Lingue',
        'languages' => [
           [
                'name' => 'Italiano',
                'class' => 'progress__ita'
            ],
            [
                'name' => 'Spagnolo',
                'class' => 'progress__esp'
            ],
            [
                'name' => 'Inglese',
                'class' => 'progress__eng'
            ],
        ]
   
    ],

    'profile' => [
        'title' => 'Profilo professionale',
        'main' => "Web Developer specializzato nello sviluppo front-end e back-end con solida esperienza nella programmazione orientata agli oggetti usando vari linguaggi di programmazione.",
        'content' => "Competente nell'implementazione di pattern architetturali come MVC e MVVM, nella progettazione e nello sviluppo di API REST e nell'uso dei metodi CRUD su database relazionali e non relazionali."
    ],


    'projects' => [
        'title' => 'Progetti',
        'languages' => 'Linguaggi utilizzati',
        'projects' => [
           [
                'name' => $projects['project_holiday']['title'],
                'url' => $projects['project_holiday']['url'],
                'content' => "Simulatore sito per prenotazione di case vacanze in Sardegna, progettato per offrire un'esperienza utente intuitiva e moderna",
                'languages' => $projects['project_holiday']['languages']
            ],

            [
                'name' => $projects['project_social']['title'],
                'url' => $projects['project_social']['url'],
                'content' => "Social network ispirato a Facebook, progettato per offrire funzionalità di connessione tra utenti, con aggiornamenti in tempo reale e un'interfaccia user-friendly",
                'languages' => $projects['project_social']['languages']
            ],


            [
                'name' => $projects['project_shop']['title'],
                'url' => $projects['project_shop']['url'],
                'content' => "Simulatore interattivo di un sito per la vendita di prodotti, progettato per replicare un'esperienza di e-commerce completa e user-friendly",
                'languages' => $projects['project_shop']['languages']
            ]
        ]
    ],


    
    'experience' => [
        'title' => 'Esperienza lavorativa',
        'experience' => [
           [
                'name' => 'Full Stack Web Developer',
                'date' => to_now($jobs['start']),
                'content' => "Sviluppo web autonomo di progetti complessi, tra cui piattaforme social, siti di e-commerce e portali per la gestione di case vacanze, 
                              realizzati utilizzando una combinazione di linguaggi e tecnologie frontend e backend;"
            ],

            [
                'name' => 'Ministero Difesa',
                'date' => $jobs['military'],
                'content' => "Graduato Esercito Italiano,
                                specializzato nel corpo Bersaglieri e
                                Fanteria Aeromobile."
            ],

        ]
    ],


 
    'courses' => [
        'title' => 'Formazione',
        'courses' => [

            [
                'name' => 'Corso Docker',
                'date' => translate_hours($courses['docker']),
                'content' => "Corso Docker"
            ], 

            [
                'name' => 'Master Typescript, JS moderno',
                'date' => translate_hours($courses['master_typescript&js']),
                'content' => "Master Typescipt e Javascript Moderno, ES2024 APIs html5"
            ], 

            [
                'name' => 'Corso SEO',
                'date' => translate_hours($courses['seo']),
                'content' => "Corso di SEO e posizionamento web"
            ],

            [
                'name' => 'Corso VPS',
                'date' => translate_hours($courses['vps']),
                'content' => "Gestione VPS nginx con Letsencrypt"
            ],

            [
                'name' => 'Master CSS3 Avanzato',
                'date' => translate_hours($courses['advanced_css']),
                'content' => "Master avanzato di CSS3"
            ],
 
            [
                'name' => 'Corso GIT',
                'date' => translate_hours($courses['git']),
                'content' => "Corso GIT e console di comando"
            ], 

            [
                'name' => 'Master Logica di programmazione',
                'date' => translate_hours($courses['logic_js']),
                'content' => "Master in logica di programmazione di Javascript"
            ],

            [
                'name' => 'Master Angular, JQuery, NodeJS, Javascript',
                'date' => translate_hours($courses['js&frameworks']),
                'content' => "Master con Angular, JQuery, NodeJS e Javascript"
            ],

            [
                'name' => 'Corso Full Stack Web Developer',
                'date' => translate_months($courses['click_accademy']),
                'content' => "Corso professionale di Click Accademy PHP, Mysql, Javascript, CSS3, Html5, Worpress"
            ],

            [
                'name' => 'Diploma Scientifico Informatico',
                'date' => $courses['diploma'],
                'content' => "Diploma scientifico con specializzazione informatica"
            ],

        ]
    ], 


    'authorization' => "Autorizzo il trattamento dei miei dati personali
                        ai sensi ai sensi del Decreto Legislativo
                        196/2003, coordinato con il Decreto Legislativo
                        101/2018, e dell'art. 13 del GDPR (Regolamento
                        UE 2016/679) ai fini della ricerca e selezione
                        personale"


);



function to_now($value){
    return "$value ad oggi";
}


function translate_hours($course){
    $hours = $course[0];
    $year = $course[1];
    return "$hours ore - $year";
}



function translate_months($course){
    $months = $course[0];
    $year = $course[1];
    return "$months mesi - $year";
}