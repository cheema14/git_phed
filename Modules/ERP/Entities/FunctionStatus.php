<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class FunctionStatus extends Model
{
    public function fetch_functional_export_data(){
        
        $data = FunctionStatus::orderBy('created_at', 'DESC')->select('id', 'function_status_title')->get();

        return $data;
    }
}
