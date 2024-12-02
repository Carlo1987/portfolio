
<?php

require 'projects.php';
require 'courses.php';
require 'jobs.php';

$name_pdf = "Curriculum Loi Carlo español.pdf";


$curriculum = array(
    'contacts' => [
        'title' => 'contactos',
        'telephone' => 'Cellular',
        'location' => 'Localidad'
    ],


    'skills' => [
        'title' => "Abilidades",
        'library' => 'Librerias'
    ],


    'languages' => [
        'title' => 'Idiomas',
        'languages' => [
            [
                'name' => 'Italiano',
                'class' => 'progress__ita'
            ],
            [
                'name' => 'Español',
                'class' => 'progress__esp'
            ],
            [
                'name' => 'Ingles',
                'class' => 'progress__eng'
            ],
        ]
  
    ],


    'profile' => [
        'title' => 'Perfil profesional',
        'main' => 'Desarrollador Web especializado en el desarrollo front-end y back-end con sólida experiencia en programación orientada a objetos utilizando varios lenguajes de programación.',
        'content' => "Competente en la implementación de patrones arquitectónicos como MVC y MVVM, en el diseño y desarrollo de API REST, en el manejo de los métodos CRUD con bases de datos relacionales y no relacionales."
    ],


    
    'projects' => [
        'title' => 'Proyectos',
        'languages' => 'Lenguajes utilizados',
        'projects' => [
           [
                'name' => $projects['project_holiday']['title'],
                'url' => $projects['project_holiday']['url'],
                'content' => "Simulador de un sitio para la reserva de casas de vacaciones en Cerdeña, diseñado para ofrecer una experiencia de usuario intuitiva y moderna",
                'languages' => $projects['project_holiday']['languages']
            ],

            [
                'name' => $projects['project_social']['title'],
                'url' => $projects['project_social']['url'],
                'content' => "Red social inspirada en Facebook, diseñada para ofrecer funciones de conexión entre usuarios, con actualizaciones en tiempo real y una interfaz fácil de usar",
                'languages' => $projects['project_social']['languages']
            ],


            [
                'name' => $projects['project_shop']['title'],
                'url' => $projects['project_shop']['url'],
                'content' => "Simulador interactivo de un sitio para la venta de productos, diseñado para replicar una experiencia de comercio completa y fácil de usar",
                'languages' => $projects['project_shop']['languages']
            ]
        ]
    ],



    'experience' => [
        'title' => 'Experiencia laboral',
        'experience' => [
           [
                'name' => 'Full Stack Web Developer',
                'date' => to_now($jobs['start']),
                'content' => "Desarrollo web autónomo de proyectos complejos, incluyendo plataformas sociales, sitios de comercio electrónico y portales para la gestión de casas vacacionales, 
                              realizados utilizando una combinación de lenguajes y tecnologías frontend y backend;"
            ],

            [
                'name' => 'Ministerio Defensa Italiana',
                'date' => $jobs['military'],
                'content' => "Graduado Ejercito Italiano con
                                especialidad Bersaglieri y Fanteria Aeromobile."
            ],

        ]
    ],




    'courses' => [
        'title' => 'Formaciòn',
        'courses' => [

            [
                'name' => 'Curso SEO',
                'date' => translate_hours($courses['seo']),
                'content' => "Curso de SEO e posicionamiento web"
            ],

            [
                'name' => 'Curso VPS',
                'date' => translate_hours($courses['vps']),
                'content' => "Administrar VPS con Letsencrypt"
            ],

            [
                'name' => 'Master CSS3 Avanzado',
                'date' => translate_hours($courses['advanced_css']),
                'content' => "Master avanzado de CSS3"
            ],

            [
                'name' => 'Master Logica de programacion',
                'date' => translate_hours($courses['logic_js']),
                'content' => "Master en logica de programacion de Javascript"
            ],

            [
                'name' => 'Master Angular, JQuery, NodeJS, Javascript',
                'date' => translate_hours($courses['js&frameworks']),
                'content' => "Master de Angular, JQuery, NodeJS e Javascript"
            ],

            [
                'name' => 'Curso Full Stack Web Developer',
                'date' => translate_months($courses['click_accademy']),
                'content' => "Curso profesional de Click Accademy de PHP, Mysql, Javascript, CSS3, Html5, Worpress"
            ],

            [
                'name' => 'Diploma de Informatica',
                'date' => $courses['diploma'],
                'content' => "Diploma cientifico con especializacion informatica"
            ],

        ]
    ], 



    
    'authorization' => "Autorizo el tratamiento de mis datos personales de conformidad con el Reglamento General de Protección de Datos (RGPD - Reglamento UE 2016/679) 
                        y las normativas locales aplicables, exclusivamente con fines de selección y reclutamiento de personal"


);


function to_now($value){
    return "$value hasta hoy";
}



function translate_hours($course){
    $hours = $course[0];
    $year = $course[1];
    return "$hours horas - $year";
}



function translate_months($course){
    $months = $course[0];
    $year = $course[1];
    return "$months meses - $year";
}