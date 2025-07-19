<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Enums\ProjectEnum;

class Project extends Model
{
    public function getSkillsName($skills)
    {
        $projectSkills = explode(',', $this->dev_languages);
        $skillsNames = [];

        foreach ($projectSkills as $ps) {
            foreach($skills as $skill){
                if ($ps == $skill['id']) {
                    $skillsNames[] = $skill['name'];
                }
            } 
        }
        return implode(', ', $skillsNames);
    }


    public function getStatus()
    {
        $status = 'attivo';
        if($this->status == ProjectEnum::Stopped){
            $status = 'sospeso';
        }
        return $status;
    }
}

