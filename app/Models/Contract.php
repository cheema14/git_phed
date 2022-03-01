<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contract';
    protected $fillable = [
        'cnt_compl_date', 'cnt_date','cnt_name','cnt_code', 'cnt_doc_no', 'cnt_status', 'cnt_app_code', 
        'cnt_amount', 'cnt_auth', 'cnt_remarks', 'cnt_insert_term'
    ];

    public function scheme(){
        return $this->hasOne(Scheme::class, 'id', 'cnt_scheme_idFk');
    }
}
