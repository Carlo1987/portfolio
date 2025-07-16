<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function time($language = null)
    {
        $hours = 'ore';
        $monthes = 'mesi';
        $years = 'anni';
        if($language && $language == 'ESP'){
            $hours = 'horas';
            $monthes = 'meses';
            $years = 'años';
        }else if($language && $language == 'ENG'){
            $hours = 'hours';
            $monthes = 'monthes';
            $years = 'years';
        }

        $format = $hours;
        if($this->format == 2){
            $format = $monthes;
        }else if($this->format == 3){
            $format = $years;
        }
        $duration = $this->timeDuration;
        return "$duration $format";
    }
}
