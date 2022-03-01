<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district';

    public function province(){
        return $this->hasOne(Province::class, 'id', 'province_id');
    }

    public function zone(){
        return $this->hasOne(Zone::class, 'id', 'zone_id');
    }

    public function division(){
        return $this->hasOne(Division::class, 'id', 'division_id');
    }
}
