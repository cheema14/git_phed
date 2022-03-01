<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class SponseredAgency extends Model
{
    public function fetch_spons_export_data(){

        $data = SponseredAgency::orderBy('created_at', 'DESC')->select('id', 'description','short_description')->get();

        return $data;
    }
}
