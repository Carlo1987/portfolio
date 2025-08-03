<?php

namespace App\Http\Helpers;

trait TimeHelper {

    public function courseTime($course, $language = null)
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
        if($course->format == 2){
            $format = $monthes;
        }
        if($course->format == 3){
            $format = $years;
        }
        $duration = $course->timeDuration;
        return "$duration $format";
    }

    public function jobTime($from, $to = null, $language = null)
      {
        $time = '';
    
        if($to){
                $time = $from . ' - ' . $to;
        }else{
                $currentTime = ' ad oggi';
                if($language && $language == 'es'){
                    $currentTime = ' hasta hoy';
                }
                if($language && $language == 'en'){
                    $currentTime = ' to present';
                }
                $time = $from . $currentTime;
        }

        return $time;
      }
}