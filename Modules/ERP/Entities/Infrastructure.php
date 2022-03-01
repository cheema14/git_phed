<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    public function fetch_infra_export_data(){

        $data = Infrastructure::orderBy('infra_desc', 'ASC')->select('id', 'infra_desc')->get();
        
        return $data;
    }

}
