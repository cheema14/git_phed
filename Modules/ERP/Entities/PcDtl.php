<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class PcDtl extends Model
{
    public function main_head()
    {
        return $this->hasOne(Infrastructure::class, 'id', 'main_head');
    }

    public function sub_head()
    {
        return $this->hasOne(SubHead::class, 'id', 'sub_head');
    }

    public function detail_head()
    {
        return $this->hasOne(DetailHead::class, 'id', 'detail_head');
    }

}
