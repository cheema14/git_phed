<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class SuprEngineer extends Model
{
    public function province(){
        return $this->hasOne(Province::class, 'id', 'province_idFk');
    }

    public function zone(){
        return $this->hasOne(Zone::class, 'id', 'zone_idFk');
    }

    public function division(){
        return $this->hasOne(Division::class, 'id', 'division_idFk');
    }

    public function chiefEngineer(){
        return $this->hasOne(ChiefEngineer::class,'id','ce_idFk');
    }

    public function fetch_se_export_data(){
        
        $data = SuprEngineer::with('province:province_name,id',
        'zone:zone_name,id','division:division_name,id','chiefEngineer:name,id')->get();

        $data->map(function ($i) {
            $i->province_name = ($i->province) ? $i->province->province_name : 'N/A';
            $i->zone_name = ($i->zone) ? $i->zone->zone_name : 'N/A'; 
            $i->division_name = ($i->division) ? $i->division->division_name : 'N/A'; 
            $i->ce_name = ($i->chiefEngineer) ? $i->chiefEngineer->name : 'N/A'; 
        });

        return $data;
    }

}
