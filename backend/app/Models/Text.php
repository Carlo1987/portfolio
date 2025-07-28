<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    public function getTextsAllLanguages()
    {
        return array(
                    'text_ITA' => $this->text_ITA,
                    'text_ESP' => $this->text_ESP,
                    'text_ENG' => $this->text_ENG,
                    'order' => $this->order,
                );
    }
}
