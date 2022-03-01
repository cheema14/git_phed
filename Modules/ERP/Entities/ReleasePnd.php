<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class ReleasePnd extends Model
{
    protected $table = 'release_pnd';
    protected $fillable = [
        'rel_block_code', 'rel_adp_year_code','rel_adp_no','rel_status', 'rel_date', 'rel_amount', 'rel_capital', 
        'rel_revenue', 'rel_foreign_aid', 'rel_new_ongoing_code', 'rel_prog_code','rel_insert_term'
    ];

    public function scheme(){
        return $this->hasOne(Scheme::class, 'id', 'rel_scheme_idFk');
    }
}
