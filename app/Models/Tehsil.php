<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tehsil extends Model
{
    protected $table = 'tehsil';

    public function province(){
        return $this->hasOne(Province::class, 'id', 'province_id');
    }

    public function zone(){
        return $this->hasOne(Zone::class, 'id', 'zone_id');
    }

    public function division(){
        return $this->hasOne(Division::class, 'id', 'division_id');
    }

    public function district(){
        return $this->hasOne(District::class, 'id', 'district_id');
    }
}
