<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class WaterSource extends Model
{
    public function fetch_wsource_export_data(){

        $data = WaterSource::orderBy('created_at', 'DESC')->select('id', 'water_source_title')->get();

        return $data;
    }
}
