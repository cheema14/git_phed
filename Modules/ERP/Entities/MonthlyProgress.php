<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class MonthlyProgress extends Model
{
    protected $table = 'monthly_progress';
    protected $fillable = [
        'mnth_prog_month_code', 'mnth_prog_year_code','mnth_prog_phhysical_address','mnth_prog_remarks', 'mnth_prog_last_updated_term', 'mnth_prog_fin_upto_year', 'mnth_prog_pre_fin_prog', 
        'mnth_prog_submit', 'mnth_prog_financial_prog_upto', 'mnth_prog_se_ent_by', 'mnth_prog_se_ent_date','mnth_prog_se_ent_term','mnth_prog_ce_enty_by',
        'mnth_prog_ce_ent_date','mnth_prog_ce_ent_term','mnth_prog_hist_flag','mnth_prog_insert_term'
    ];

    public function scheme(){
        return $this->hasOne(Scheme::class, 'id', 'mnth_prog_scheme_idFk');
    }
}
