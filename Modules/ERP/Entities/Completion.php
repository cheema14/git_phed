<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class Completion extends Model
{
    public function fetch_completion_export_data(){

        $data = Completion::orderBy('created_at', 'DESC')->select('id', 'completion_status')->get();

        return $data;
    }
}
