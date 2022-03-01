<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailHead extends Model
{
    public function SubHead(){
        return $this->hasOne(SubHead::class, 'id', 'sub_head_idFk');
    }
    
}
