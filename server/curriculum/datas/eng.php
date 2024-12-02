
<?php


require 'projects.php';
require 'courses.php';
require 'jobs.php';



$name_pdf = "Curriculum Loi Carlo English.pdf";

$curriculum = array(
    'contacts' => [
        'title' => 'Contacts',
        'telephone' => 'Phone',
        'location' => 'Location'
    ],

    'skills' => [
        'title' => "Skills",
        'library' => 'Libraries'
    ],

    'languages' => [
        'title' => 'Languages',
        'languages' => [
           [
                'name' => 'Italian',
                'class' => 'progress__ita'
            ],
            [
                'name' => 'Spanish',
                'class' => 'progress__esp'
            ],
            [
                'name' => 'English',
                'class' => 'progress__eng'
            ],
        ]
    ],

    'profile' => [
        'title' => 'Professional Profile',
        'main' => "Web Developer specializing in front-end and back-end development with solid experience in object-oriented programming using various programming languages.",
        'content' => "Skilled in implementing architectural patterns like MVC and MVVM, designing and developing REST APIs, and using CRUD methods on relational and non-relational databases."
    ],

    'projects' => [
        'title' => 'Projects',
        'languages' => 'Languages Used',
        'projects' => [
           [
                'name' => $projects['project_holiday']['title'],
                'url' => $projects['project_holiday']['url'],
                'content' => "Simulator of a website for booking holiday homes in Sardinia, designed to provide an intuitive and modern user experience.",
                'languages' => $projects['project_holiday']['languages']
            ],

            [
                'name' => $projects['project_social']['title'],
                'url' => $projects['project_social']['url'],
                'content' => "Social network inspired by Facebook, designed to offer user connection features, real-time updates, and a user-friendly interface.",
                'languages' => $projects['project_social']['languages']
            ],

            [
                'name' => $projects['project_shop']['title'],
                'url' => $projects['project_shop']['url'],
                'content' => "Interactive simulator of a website for product sales, designed to replicate a complete and user-friendly e-commerce experience.",
                'languages' => $projects['project_shop']['languages']
            ]
        ]
    ],

    'experience' => [
        'title' => 'Work Experience',
        'experience' => [
           [
                'name' => 'Full Stack Web Developer',
                'date' => to_now($jobs['start']),
                'content' => "Independent web development of complex projects, including social platforms, e-commerce sites, and portals for holiday home management, created using a combination of front-end and back-end languages and technologies."
            ],

            [
                'name' => 'Ministry of Defense',
                'date' => $jobs['military'],
                'content' => "Graduated from the Italian Army, specialized in the Bersaglieri and Airborne Infantry corps."
            ],
        ]
    ],

    'courses' => [
        'title' => 'Education and Training',
        'courses' => [
            [
                'name' => 'SEO Course',
                'date' => translate_hours($courses['seo']),
                'content' => "Course on SEO and web positioning."
            ],

            [
                'name' => 'VPS Course',
                'date' => translate_hours($courses['vps']),
                'content' => "Managing VPS with Letsencrypt."
            ],

            [
                'name' => 'Advanced CSS3 Masterclass',
                'date' => translate_hours($courses['advanced_css']),
                'content' => "Advanced CSS3 masterclass."
            ],

            [
                'name' => 'Programming Logic Masterclass',
                'date' => translate_hours($courses['logic_js']),
                'content' => "Masterclass in JavaScript programming logic."
            ],

            [
                'name' => 'Angular, JQuery, NodeJS, JavaScript Masterclass',
                'date' => translate_hours($courses['js&frameworks']),
                'content' => "Masterclass covering Angular, JQuery, NodeJS, and JavaScript."
            ],

            [
                'name' => 'Full Stack Web Developer Course',
                'date' => translate_months($courses['click_accademy']),
                'content' => "Professional course by Click Academy: PHP, MySQL, JavaScript, CSS3, HTML5, WordPress."
            ],

            [
                'name' => 'Scientific Computing Diploma',
                'date' => $courses['diploma'],
                'content' => "High school diploma with a specialization in computing."
            ],
        ]
    ],

    'authorization' => "I hereby authorize the processing of my personal data in accordance with Legislative Decree 196/2003, as amended by Legislative Decree 
                        101/2018, and Article 13 of the GDPR (EU Regulation 2016/679) for the purposes of recruitment and selection."
);




function to_now($value){
    return "$value to present";
}


function translate_hours($course){
    $hours = $course[0];
    $year = $course[1];
    return "$hours hours - $year";
}



function translate_months($course){
    $months = $course[0];
    $year = $course[1];
    return "$months months - $year";
}