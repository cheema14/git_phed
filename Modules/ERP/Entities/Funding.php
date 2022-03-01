<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class Funding extends Model
{
    public function fetch_funding_export_data(){

        $data = Funding::orderBy('created_at', 'DESC')->select('id', 'funding_status')->get();

        return $data;
    }
}
