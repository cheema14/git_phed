<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class CommunityShare extends Model
{
    protected $table = 'community_shares';
    protected $fillable = [
        'community_shares_deposit_date', 'community_shares_dd_no','community_shares_amount','community_shares_remarks','community_shares_insert_term','community_shares_updated_term',
    ];

    public function scheme(){
        return $this->hasOne(Scheme::class, 'id', 'community_shares_scheme_idFk');
    }
}
