<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubHead extends Model
{
    public function MainHead(){
        return $this->hasOne(Infrastructure::class, 'id', 'infra_idFk');
    }
}
