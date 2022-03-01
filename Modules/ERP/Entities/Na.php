<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class Na extends Model
{
    //
    public function fetch_na_export_data(){

        $data = Na::orderBy('short_description', 'ASC')->select('id','mna_name','na_code','na_name','contact_no', 'short_description')->get();
        
        return $data;
    }
}
