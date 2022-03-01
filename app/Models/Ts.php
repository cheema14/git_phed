<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ts extends Model
{
    protected $table = 'ts';
    protected $fillable = [
        'ts_level', 'ts_date', 'ts_doc_no', 'ts_status', 'ts_app_code', 
        'ts_amount', 'ts_auth', 'ts_remarks', 'ts_insert_term'
    ];

    public function scheme(){
        return $this->hasOne(Scheme::class, 'id', 'ts_scheme_idFk');
    }
}
