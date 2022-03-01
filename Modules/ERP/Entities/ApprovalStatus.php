<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class ApprovalStatus extends Model
{
    public function fetch_approval_export_data(){

        $data = ApprovalStatus::orderBy('created_at', 'DESC')->select('id', 'approval_status_title')->get();
        
        return $data;
    }
}
