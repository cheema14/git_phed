<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class ExecutedAgency extends Model
{
    public function fetch_eagency_export_data(){

        $data = ExecutedAgency::orderBy('created_at', 'DESC')->select('id', 'description','short_description')->get();

        return $data;
    }
}
