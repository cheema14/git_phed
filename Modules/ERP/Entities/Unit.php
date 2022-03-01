<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function fetch_unit_export_data(){

        $data = Unit::orderBy('created_at', 'DESC')->select('id', 'short_desc','unit_desc')->get();
        
        return $data;
    }
}
