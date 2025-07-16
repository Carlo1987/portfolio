<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\SkillEnum;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillsData = $this->skills();

        foreach($skillsData as $data){
            $type = $data['type'];
            foreach($data['list'] as $key => $skill){
                Skill::create([
                    'type' => $type,
                    'name' => $skill['name'],
                    'image' => $skill['image'],
                    'order' => $key + 1,
                ]);
            }
        }
    }


    private function skills()
    {
        $frontendId = SkillEnum::Frontend->value;
        $backendId = SkillEnum::Backend->value;
        $databaseId = SkillEnum::Database->value;
        $devopsId = SkillEnum::DevOps->value;

        return array(
            [
                'type' => $frontendId,
                'list' => array(
                    [
                        'name' => 'Html5',
                        'image' => 'html.png',
                    ],
                    [
                        'name' => 'CSS3',
                        'image' => 'css.png',
                    ],
                     [
                        'name' => 'Sass',
                        'image' => 'sass.png',
                    ],
                    [
                        'name' => 'Bootstrap',
                        'image' => 'bootstrap.png',
                    ],
                    [
                        'name' => 'Javascript',
                        'image' => 'javascript.png',
                    ],
                    [
                        'name' => 'JQuery',
                        'image' => 'jquery.png',
                    ],
                    [
                        'name' => 'Typescript',
                        'image' => 'typescript.png',
                    ],
                    [
                        'name' => 'Angular',
                        'image' => 'angular.png',
                    ],
                    [
                        'name' => 'Redux',
                        'image' => 'redux.png',
                    ],
                    [
                        'name' => 'React',
                        'image' => 'react.png',
                    ],
                )
            ],
            [
                'type' => $backendId,
                'list' => array(
                    [
                        'name' => 'Socket.io',
                        'image' => 'socket.io.png'
                    ],
                    [
                        'name' => 'NodeJS',
                        'image' => 'nodejs.png',
                    ],
                    [
                        'name' => 'PHP',
                        'image' => 'php.png',
                    ],
                    [
                        'name' => 'Laravel',
                        'image' => 'laravel.png',
                    ]
                )
            ],
            [
                'type' => $databaseId,
                'list' => array(
                    [
                        'name' => 'MongoDB',
                        'image' => 'mongoDB.png',
                    ],
                    [
                        'name' => 'Mysql',
                        'image' => 'mysql.png',
                    ]
                )
            ],
            [
                'type' => $devopsId,
                'list' => array(
                    [
                        'name' => 'ChapGPT',
                        'image' => 'chatgpt.png',
                    ],
                    [
                        'name' => 'SEO',
                        'image' => 'seo.png',
                    ],
                    [
                        'name' => 'VPS',
                        'image' => 'vps.png', 
                    ],
                    [
                        'name' => 'Github',
                        'image' => 'github.png',
                    ],
                    [
                        'name' => 'Git',
                        'image' => 'git.png',
                    ],
                    [
                        'name' => 'Docker',
                        'image' => 'docker.png',
                    ],
                )
            ],
        );
    }
}
