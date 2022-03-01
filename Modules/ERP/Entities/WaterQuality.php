<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class WaterQuality extends Model
{
    public function fetch_wquality_export_data(){

        $data = WaterQuality::orderBy('created_at', 'DESC')->select('id', 'water_quality_title')->get();

        return $data;
    }
}
