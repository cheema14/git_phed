<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class ChiefEngineer extends Model
{
    public function province(){
        return $this->hasOne(Province::class, 'id', 'province_idFk');
    }

    public function zone(){
        return $this->hasOne(Zone::class, 'id', 'zone_idFk');
    }

    public function fetch_ce_export_data(){
        
        $data = ChiefEngineer::with('province:province_name,id','zone:zone_name,id')->get();
        
        $data->map(function ($i) {
            $i->province_name = ($i->province->province_name) ? $i->province->province_name : 'N/A';
            $i->zone_name = ($i->zone->zone_name) ? $i->zone->zone_name : 'N/A'; 
        });
        
        return $data;
    }
}
