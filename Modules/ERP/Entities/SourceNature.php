<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class SourceNature extends Model
{
    public function fetch_snature_export_data(){

        $data = SchemeNature::orderBy('created_at', 'DESC')->select('id', 'description')->get();

        return $data;
    }
}
