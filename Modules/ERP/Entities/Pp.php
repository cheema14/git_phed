<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class Pp extends Model
{
    public function Na(){
        return $this->hasOne(Na::class, 'id', 'na_id');
    }

    public function fetch_pp_export_data(){

        $data = Pp::orderBy('short_description', 'ASC')->select('id','mpa_name','pp_code','pp_name','contact_no', 'short_description')->get();

        return $data;
    }
}
