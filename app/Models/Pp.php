<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pp extends Model
{
    public function Na(){
        return $this->hasOne(Na::class, 'id', 'na_id');
    }
}
