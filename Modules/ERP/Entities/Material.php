<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public function fetch_material_export_data(){
        
        $data = Material::orderBy('created_at', 'DESC')->select('id', 'material_desc')->get();
        
        return $data;
    }

}
