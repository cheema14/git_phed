<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class Cbo extends Model
{
    protected $table = 'cbo';
    protected $fillable = [
        'cbo_sr_no', 'cbo_name','cbo_designation','cbo_contact_no'
    ];

    public function scheme(){
        return $this->hasOne(Scheme::class, 'id', 'cbo_scheme_idFk');
    }
}
