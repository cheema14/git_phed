<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class SubEngineer extends Model
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

    public function district(){
        return $this->hasOne(District::class, 'id', 'district_idFk');
    }

    public function tehsil(){
        return $this->hasOne(Tehsil::class, 'id', 'tehsil_idFk');
    }

    public function chiefEngineer(){
        return $this->hasOne(ChiefEngineer::class,'id','ce_idFk');
    }

    public function suprEngineer(){
        return $this->hasOne(SuprEngineer::class,'id','se_idFk');
    }

    public function exeEngineer(){
        return $this->hasOne(ExeEngineer::class,'id','ee_idFk');
    }

    public function sdoEngineer(){
        return $this->hasOne(Sdo::class,'id','sdo_idFk');
    }

    public function fetch_sub_export_data(){
        
        $data = SubEngineer::with('province:province_name,id',
        'zone:zone_name,id','division:division_name,id',
        'district:district_name,id','tehsil:tehsil_name,id','chiefEngineer:name,id',
        'suprEngineer:name,id','exeEngineer:name,id','sdoEngineer:name,id')->get();

        $data->map(function ($i) {
            $i->province_name = ($i->province) ? $i->province->province_name : 'N/A';
            $i->zone_name = ($i->zone) ? $i->zone->zone_name : 'N/A'; 
            $i->division_name = ($i->division) ? $i->division->division_name : 'N/A'; 
            $i->district_name = ($i->district) ? $i->district->district_name : 'N/A'; 
            $i->tehsil_name = ($i->tehsil) ? $i->tehsil->tehsil_name : 'N/A'; 
            $i->ce_name = ($i->chiefEngineer) ? $i->chiefEngineer->name : 'N/A'; 
            $i->se_name = ($i->suprEngineer) ? $i->suprEngineer->name : 'N/A'; 
            $i->ee_name = ($i->exeEngineer) ? $i->exeEngineer->name : 'N/A'; 
            $i->sdo_name = ($i->sdoEngineer) ? $i->sdoEngineer->name : 'N/A'; 
        });

        return $data;
    }
}
