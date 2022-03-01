<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;

class DetailHead extends Model
{
    public function SubHead(){
        return $this->hasOne(SubHead::class, 'id', 'sub_head_idFk');
    }

    public function MainHead(){
        return $this->hasOne(Infrastructure::class, 'id', 'main_head_idFk');
    }

    public function fetch_dhead_export_data(){

        $data = DetailHead::with(
            'SubHead:sub_head_desc,id',
            'MainHead:infra_desc,id'
        )->get();

        $data->map(function ($i) {
            $i->infra_desc = ($i->MainHead) ? $i->MainHead->infra_desc : 'N/A';
            $i->sub_head_desc = $i->SubHead->sub_head_desc; 
            $data = $i;
        });
        
        return $data;
    }
    
}
