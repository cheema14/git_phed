<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class SubHead extends Model
{
    public function MainHead(){
        return $this->hasOne(Infrastructure::class, 'id', 'infra_idFk');
    }

    public function fetch_shead_export_data(){

        $data = SubHead::with('MainHead:infra_desc,id')->get();

        $data->map(function ($i) {
            $i->infra_desc = $i->MainHead->infra_desc; // Set related nickname.
            $data = $i;
        });
        
        return $data;
    }
}
