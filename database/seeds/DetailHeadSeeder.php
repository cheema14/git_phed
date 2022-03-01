<?php

use App\DetailHead;
use Illuminate\Database\Seeder;

class DetailHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aArrayRecord = array(
            array('id'=>'1', 'sub_head_idFk'=> '1' , 'detail_head_desc'=>'6DIAPVCPIPE'),
            array('id'=>'2', 'sub_head_idFk'=> '1' , 'detail_head_desc'=>'4DIAPVCPIPE'),
            array('id'=>'3', 'sub_head_idFk'=> '6' , 'detail_head_desc'=>'6DIAPVCPIPE'),
            array('id'=>'4', 'sub_head_idFk'=> '6' , 'detail_head_desc'=>'4DIAPVCPIPE'),
            array('id'=>'5', 'sub_head_idFk'=> '6' , 'detail_head_desc'=>'3DIAPVCPIPE'),
            array('id'=>'6', 'sub_head_idFk'=> '5' , 'detail_head_desc'=>'8GIPIPE'),
            array('id'=>'7', 'sub_head_idFk'=> '5' , 'detail_head_desc'=>'6GIPIPE'),
            array('id'=>'8', 'sub_head_idFk'=> '5' , 'detail_head_desc'=>'5GIPIPE')
            
        );

        foreach ($aArrayRecord as $aRecord) {
            DetailHead::firstOrCreate($aRecord);
        }
    }
}
