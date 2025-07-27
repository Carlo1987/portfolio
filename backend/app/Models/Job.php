<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
      protected $table = 'jobs_history';

      public function time($from, $to = null, $language = null)
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
