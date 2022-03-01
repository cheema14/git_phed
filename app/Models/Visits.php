<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    protected $table = 'visits';
    protected $fillable = [
        'visit_date', 'visit_name','visit_designation','visit_inspection_code', 'visit_lat', 'visit_long', 'visit_status', 
        'visit_inspection_title', 'visit_vsf_id', 'visit_sch_visit_loc', 'visit_insert_term','visit_updated_term','visit_imei_no',
        'visit_result', 'visit_vil_ident', 'visit_vis_off', 'visit_hp_sr_no','visit_remarks_se','visit_remarks_ce'
    ];

    public function scheme(){
        return $this->hasOne(Scheme::class, 'id', 'visit_scheme_idFk');
    }
}
