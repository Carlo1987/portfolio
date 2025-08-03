<?php

namespace App\Http\Helpers;

trait ProjectHelper {
    public function projectSkillsData($dev_languages, $skills, $withImages = false)
    {
        $projectSkills = explode(',', $dev_languages);
        $skillsData = [];

        foreach ($projectSkills as $ps) {
            foreach($skills as $skill){
                if ($ps == $skill['id']) {
                    if (!$withImages) {
                        $skillsData[] = $skill['name'];
                    }else{
                        $skillsData[] = [
                            'name' => $skill['name'],
                            'image' => $skill['image'],
                        ];
                    }
                  
                }
            } 
        }  
        if (!$withImages) {
            return implode(', ', $skillsData);
        }else{
            return $skillsData;
        }
    }
}