<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class Technique extends Model
{
    protected $table = 'techniques';

    public function fetch_technique_export_data(){
        
        $data = Technique::orderBy('created_at', 'DESC')->select('id', 'technique_title')->get();
        
        return $data;
    }
}
