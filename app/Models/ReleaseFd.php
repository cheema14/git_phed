<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReleaseFd extends Model
{
    protected $table = 'release_fd';
    protected $fillable = [
        'rel_fd_block_code', 'rel_fd_adp_year_code','rel_fd_adp_no','rel_fd_status', 'rel_fd_date', 'rel_fd_amount', 'rel_fd_capital', 
        'rel_fd_revenue', 'rel_fd_foreign_aid', 'rel_fd_new_ongoing_code', 'rel_fd_prog_code','rel_fd_insert_term','rel_fd_mnth_code'
    ];

    public function scheme(){
        return $this->hasOne(Scheme::class, 'id', 'rel_fd_scheme_idFk');
    }
}
