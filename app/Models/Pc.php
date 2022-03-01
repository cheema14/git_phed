<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Scheme;

class Pc extends Model
{
    protected $table = 'pc';
    protected $fillable = [
        'pc_level', 'pc_date', 'pc_doc_no', 'pc_status', 'pc_app_code', 
        'pc_amount', 'pc_auth', 'pc_remarks', 'pc_insert_term'
    ];


    public function scheme(){
        return $this->hasOne(Scheme::class, 'id', 'pc_scheme_idFk');
    }

    public function toScheme(){
        return $this->belongsTo(Scheme::class,'id','pc_scheme_idFk');
    }

    public function status(){
        return $this->hasOne(ApprovalStatus::class,'id','pc_status');
    }
}
