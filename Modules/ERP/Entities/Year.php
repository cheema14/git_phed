<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    public function fetch_year_export_data(){
        
        $data = Year::orderBy('created_at', 'DESC')->select('id', 'code','description')->get();
                
        return $data;
    }
}
