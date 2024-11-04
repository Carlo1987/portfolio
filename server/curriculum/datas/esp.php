
<?php

require 'projects.php';

$name_pdf = "Curriculum Loi Carlo español.pdf";


$curriculum = array(
    'contacts' => [
        'title' => 'contactos',
        'telephone' => 'Cellular'
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
        'main' => 'Web Developer especializado en
                    desarrollo front-end y back-end.',
        'content' => "Experto en la programacion con
                    objectos con varios lenguajes, en
                    el patrón de arquitectura MVC y
                    MVVM, en la creacion de API REST y
                    en los metodos CRUD con Database
                    relacional (SQL) y no relacional
                    (MongoDB)."
    ],


    
    'projects' => [
        'title' => 'Proyectos',
        'projects' => [
           [
                'name' => $projects['project_holiday']['title'],
                'url' => $projects['project_holiday']['url'],
                'content' => "Simulador sitio de casas de vaciones
                                en Cerdeña donde es posible aceder
                                como “Administrador” para crear
                                nuevas casas;"
            ],

            [
                'name' => $projects['project_social']['title'],
                'url' => $projects['project_social']['url'],
                'content' => "Social inspirado a Facebook;"
            ],


            [
                'name' => $projects['project_shop']['title'],
                'url' => $projects['project_shop']['url'],
                'content' => "Simulador sitio de venta de productos
                                donde es posible registrarse como
                                “Administrador” para añadir nuevos
                                productos;"
            ]
        ]
    ],



    'experience' => [
        'title' => 'Experiencia laboral',
        'experience' => [
           [
                'name' => 'Full Stack Web Developer',
                'date' => '2023 hasta hoy',
                'content' => "Desarrollo web autodidacta de
                                proyectos social, venta de productos y casas de vacaciones 
                                creados con varios lenguajes frontend y backend;"
            ],

            [
                'name' => 'Ministerio Defensa Italiana',
                'date' => '2008-2024',
                'content' => "Graduado en el Ejercito Italiano con
                                especialidad en los cuerpos de los
                                Bersaglieri y Fanteria Aeromobile."
            ],

        ]
    ],




    'courses' => [
        'title' => 'Cursos',
        'courses' => [

            [
                'name' => 'Curso SEO',
                'date' => '7 horas - 2024',
                'content' => "Curso de SEO e posicionamiento web"
            ],

            [
                'name' => 'Curso VPS',
                'date' => '10 horas - 2024',
                'content' => "Administrar VPS con Letsencrypt"
            ],

            [
                'name' => 'Master CSS3 Avanzado',
                'date' => '37.5 horas - 2024',
                'content' => "Master avanzado de CSS3"
            ],

            [
                'name' => 'Master Logica de programacion',
                'date' => '8 horas - 2024',
                'content' => "Master en logica de programacion de Javascript"
            ],

            [
                'name' => 'Master Angular, JQuery, NodeJS, Javascript',
                'date' => '33 horas - 2023',
                'content' => "Master de Angular, JQuery, NodeJS e Javascript"
            ],

            [
                'name' => 'Curso Full Stack Web Developer',
                'date' => '6 meses - 2022/2023',
                'content' => "Curso profesional de Click Accademy de PHP, Mysql, Javascript, CSS3, Html5, Worpress"
            ],

            [
                'name' => 'Diploma de Informatica',
                'date' => '2006',
                'content' => "Diploma cientifico con especializacion informatica"
            ],

        ]
    ], 



    
    'authorization' => "Autorizo el procesamiento de mis datos
                        personales de conformidad en conformidad con
                        el Decreto Legislativo 196/2003, coordinado con
                        el Decreto Legislativo 101/2018, y el art. 13 de
                        GDPR (Reglamento UE 2016/679) con fines de
                        investigación y selección de personal"


);