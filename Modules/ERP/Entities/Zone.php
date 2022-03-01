<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $table = 'zone';

    public function province(){
        return $this->hasOne(Province::class, 'id', 'province_id');
    }

    public function fetch_zone_export_data(){
        
         
        $data = Zone::with(
            'province:province_name,id',
        )->get();


        
        $data->map(function ($i) {
            $i->province_name = $i->province->province_name; // Set related nickname.
            $i->province_id = $i->province->id; // Set related nickname.
            $data = $i;
        });
        
        return $data;

    }
}
