<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';

    public function fetch_area_export_data(){

        $data = Area::orderBy('created_at', 'DESC')->select('id', 'area_title')->get();

        return $data;
    }
}
