<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class HhConnections extends Model
{
    protected $table = 'hh_connections';
    protected $fillable = [
        'hh_connections_sr_no', 'hh_connections_owner','hh_connections_member','hh_connections_cell_no','hh_connections_insert_term','hh_connections_updated_term',
    ];

    public function scheme(){
        return $this->hasOne(Scheme::class, 'id', 'hh_connections_scheme_idFk');
    }
}
