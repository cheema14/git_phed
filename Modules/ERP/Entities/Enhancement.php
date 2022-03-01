<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class Enhancement extends Model
{
    protected $table = 'enhancement';
    protected $fillable = [
        'enhancement_date', 'enhancement_amount','enhancement_auth','enhancement_doc_no', 'enhancement_remarks', 'enhancement_status', 'enhancement_app_code', 
        'enhancement_insert_term', 'enhancement_updated_term', 'enhancement_enh_sr_no'
    ];

    public function scheme(){
        return $this->hasOne(Scheme::class, 'id', 'enhancement_scheme_idFk');
    }
}
