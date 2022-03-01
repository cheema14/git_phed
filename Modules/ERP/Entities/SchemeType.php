<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class SchemeType extends Model
{
    protected $table = 'scheme_types';

    public function fetch_stype_export_data(){
        
        $data = SchemeType::orderBy('created_at', 'DESC')->select('id', 'type_title','short_desc')->get();

        return $data;
    }
}
