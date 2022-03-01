<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aa extends Model
{
    protected $table = 'aa';
    protected $fillable = [
        'aa_forum_code', 'aa_date', 'aa_doc_no', 'aa_status', 'aa_app_code', 
        'aa_amount', 'aa_auth', 'aa_remarks', 'aa_insert_term'
    ];

    public function scheme(){
        return $this->hasOne(Scheme::class, 'id', 'aa_scheme_idFk');
    }
}
