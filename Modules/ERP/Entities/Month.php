<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    public function fetch_month_export_data(){

        $data = Month::orderBy('created_at', 'DESC')->select('id', 'code','description','short_description')->get();

        return $data;
    }
}
