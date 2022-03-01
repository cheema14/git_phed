<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    protected $table = 'assets';
    protected $fillable = [
        'asset_type_code', 'asset_description','asset_capacity_unit','asset_insert_term', 'asset_updated_term', 
    ];

    public function scheme(){
        return $this->hasOne(Scheme::class, 'id', 'asset_scheme_idFk');
    }
}
