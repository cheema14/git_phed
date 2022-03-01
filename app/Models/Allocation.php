<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    protected $table = 'allocation';
    protected $fillable = [
        'alo_block_code', 'alo_adp_year_code','alo_adp_no','alo_status', 'alo_date', 'alo_amount', 'alo_capital', 
        'alo_revenue', 'alo_foreign_aid', 'alo_new_ongoing_code', 'alo_prog_code','alo_insert_term'
    ];
    
    public function scheme(){
        return $this->hasOne(Scheme::class, 'id', 'alo_scheme_idFk');
    }
}
