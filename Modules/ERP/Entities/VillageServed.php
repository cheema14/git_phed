<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class VillageServed extends Model
{
    protected $table = 'village_served';
    protected $fillable = [
        'village_served_vcode', 'village_served_vname','village_served_population_nintyeight',
        'village_served_population_twoeight','village_served_no_of_houses',
        'village_served_water_source','village_served_water_zone','village_served_barani_area',
        'village_served_contamination','village_served_remarks','village_served_insert_term',
        'village_served_updated_term','village_served_loc_type',
    
    ];

    public function scheme(){
        return $this->hasOne(Scheme::class, 'id', 'village_served_scheme_idFk');
    }
}
