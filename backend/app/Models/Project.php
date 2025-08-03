<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Enums\ProjectEnum;

class Project extends Model
{
    public function getStatus()
    {
        $status = 'attivo';
        if($this->status == ProjectEnum::Stopped){
            $status = 'sospeso';
        }
        return $status;
    }
}

