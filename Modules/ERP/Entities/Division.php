<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = 'division';

    public function province(){
        return $this->hasOne(Province::class, 'id', 'province_id');
    }

    public function zone(){
        return $this->hasOne(Zone::class, 'id', 'zone_id');
    }

    public function fetch_division_export_data(){
        
        $data = Division::with(
            'province:province_name,id',
            'zone:zone_name,id',
        )->orderBy('province_id','ASC')->orderBy('id','ASC')->get();
        
        $data->map(function ($i) {
            $i->province_name = $i->province->province_name; // Set related nickname.
            $i->province_id = $i->province->id; 
            $i->zone_name = $i->zone->zone_name; 
            $i->zone_id = $i->zone->id; 
            $data = $i;
        });

        return $data;
    }
}
