<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class OMBy extends Model
{
    public function fetch_om_export_data(){

        $data = OMBy::orderBy('created_at', 'DESC')->select('id', 'description')->get();

        return $data;
    }
}
