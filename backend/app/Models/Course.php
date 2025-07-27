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
        if($language && $language == 'es'){
            $hours = 'horas';
            $monthes = 'meses';
            $years = 'años';
        }
        if($language && $language == 'en'){
            $hours = 'hours';
            $monthes = 'monthes';
            $years = 'years';
        }

        $format = $hours;
        if($this->format == 2){
            $format = $monthes;
        }
        if($this->format == 3){
            $format = $years;
        }
        $duration = $this->timeDuration;
        return "$duration $format";
    }
}
