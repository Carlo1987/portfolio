<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function formatBladeContacts()
    {
        $this->phone = str_replace('_',' ',$this->phone);
        $this->location = str_replace('_',' ',$this->location);
        return $this;
    }

    public function formatDBContacts()
    {
        $this->phone = str_replace(' ','_',$this->phone);
        $this->location = str_replace(' ','_',$this->location);
        return $this;
    }
}
