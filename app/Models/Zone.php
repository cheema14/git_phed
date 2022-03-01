<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $table = 'zone';

    public function province(){
        return $this->hasOne(Province::class, 'id', 'province_id');
    }
}
