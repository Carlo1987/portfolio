
<?php


require 'projects.php';


$name_pdf = "Curriculum Loi Carlo italiano.pdf";



$curriculum = array(
    'contacts' => [
        'title' => 'contatti',
        'telephone' => 'Telefono'
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
        'main' => "Web Developer specializzato nello sviluppo front-end e back-end. ",
        'content' => "Padrone della programmazione orientata ad oggetti con differenti linguaggi di programmazione, dei pattern architetturali MVC e MVVM, della costruzione di API REST e dei metodi CRUD sia con Database relazionali (SQL) che non relazionali (MongoDB)."
    ],


    'projects' => [
        'title' => 'Progetti',
        'projects' => [
           [
                'name' => $projects['project_holiday']['title'],
                'url' => $projects['project_holiday']['url'],
                'content' => "Simulatore sito di prenotazione
                            vacanze in Sardegna dov’è possibile
                            registrarsi come “Amministratore”
                            per creare nuove case;"
            ],

            [
                'name' => $projects['project_social']['title'],
                'url' => $projects['project_social']['url'],
                'content' => "Social ispirato a Facebook;"
            ],


            [
                'name' => $projects['project_shop']['title'],
                'url' => $projects['project_shop']['url'],
                'content' => "Simulatore sito di vendita prodotti
                            dov’è possibile registrasi come
                            “Amministratore” per aggiungere
                            nuovi prodotti da vendere;"
            ]
        ]
    ],


    
    'experience' => [
        'title' => 'Esperienza lavorativa',
        'experience' => [
           [
                'name' => 'Full Stack Web Developer',
                'date' => '2023 ad oggi',
                'content' => "Sviluppo web da autodidatta di
                                progetti social, vendita prodotti e case vacanze realizzati con vari
                                linguaggi frontend e backend;"
            ],

            [
                'name' => 'Ministero Difesa',
                'date' => '2008-2024',
                'content' => "Graduato dell’ Esercito Italiano,
                                specializzato nel corpo Bersaglieri e
                                Fanteria Aeromobile."
            ],

        ]
    ],


 
    'courses' => [
        'title' => 'Corsi di studio',
        'courses' => [

            [
                'name' => 'Corso SEO',
                'date' => '7 ore - 2024',
                'content' => "Corso di SEO e posizionamento web"
            ],

            [
                'name' => 'Corso VPS',
                'date' => '10 ore - 2024',
                'content' => "Gestione VPS con Letsencrypt"
            ],

            [
                'name' => 'Master CSS3 Avanzato',
                'date' => '37.5 ore - 2024',
                'content' => "Master avanzato di CSS3"
            ],

            [
                'name' => 'Master Logica di programmazione',
                'date' => '8 ore - 2024',
                'content' => "Master in logica di programmazione di Javascript"
            ],

            [
                'name' => 'Master Angular, JQuery, NodeJS, Javascript',
                'date' => '33 ore - 2023',
                'content' => "Master con Angular, JQuery, NodeJS e Javascript"
            ],

            [
                'name' => 'Corso Full Stack Web Developer',
                'date' => '6 mesi - 2022/2023',
                'content' => "Corso professionale di Click Accademy PHP, Mysql, Javascript, CSS3, Html5, Worpress"
            ],

            [
                'name' => 'Diploma Scientifico Informatico',
                'date' => '2006',
                'content' => "Diploma scientifico con specializzazione informatica"
            ],

        ]
    ], 


    'authorization' => "Autorizzo il trattamento dei miei dati personali
                        ai sensi ai sensi del Decreto Legislativo
                        196/2003, coordinato con il Decreto Legislativo
                        101/2018, e dell'art. 13 del GDPR (Regolamento
                        UE 2016/679) ai fini della ricerca e selezione
                        personale "


);