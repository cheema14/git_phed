<?php

namespace Modules\ERP\Entities;

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

    public function fetch_tehsil_export_data(){

        $data = Tehsil::with(
            'province:province_name,id',
            'zone:zone_name,id',
            'division:division_name,id',
            'district:district_name,id',
        )->orderBy('province_id','ASC')->orderBy('zone_id','ASC')->orderBy('division_id','ASC')->orderBy('district_id','ASC')->orderBy('id','ASC')->get();
        
        $data->map(function ($i) {
            $i->province_name = $i->province->province_name; // Set related nickname.
            $i->zone_name = $i->zone->zone_name; // Set related nickname.
            $i->division_name = $i->division->division_name; // Set related nickname.
            $i->district_name = $i->district->district_name; // Set related nickname.
            $i->province_id = $i->province->id;
            $i->zone_id = $i->zone->id;
            $i->division_id = $i->division->id;
            $i->district_id = $i->district->id;
            $data = $i;
        });

        return $data;
    }
}
