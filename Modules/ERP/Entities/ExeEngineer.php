<?php


namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class ExeEngineer extends Model
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

    public function chiefEngineer(){
        return $this->hasOne(ChiefEngineer::class,'id','ce_idFk');
    }

    public function suprEngineer(){
        return $this->hasOne(SuprEngineer::class,'id','supr_engineer_idFk');
    }

    public function fetch_ee_export_data(){

        $data = ExeEngineer::with('province:province_name,id',
        'zone:zone_name,id','division:division_name,id','district:district_name,id','chiefEngineer:name,id','suprEngineer:name,id')->get();

        $data->map(function ($i) {
            $i->province_name = ($i->province) ? $i->province->province_name : 'N/A';
            $i->zone_name = ($i->zone) ? $i->zone->zone_name : 'N/A'; 
            $i->division_name = ($i->division) ? $i->division->division_name : 'N/A'; 
            $i->district_name = ($i->district) ? $i->district->district_name : 'N/A'; 
            $i->ce_name = ($i->chiefEngineer) ? $i->chiefEngineer->name : 'N/A'; 
            $i->se_name = ($i->suprEngineer) ? $i->suprEngineer->name : 'N/A'; 
        });

        return $data;
    }
}
